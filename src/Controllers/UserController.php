<?php
    namespace App\Controllers;
    use App\Models\Utilisateur;
    use App\Models\Client;
    use App\Models\Coach;

    class UserController extends Controller {

        /**
         * 
         * Display a listing of the resource
         * @param array $params
         * @return void
         * 
         */ 
        public function index(array $params = [], array $post = []) {
            echo 'User controller index method';
        }

        /**
         * 
         * Create a new resource
         * @param array $params
         * @param array $post
         * @return void
         * 
         */
        public function create(array $params, array $post) {
           $email = $post['email'];
           //check if e-mail exist
            $user = Utilisateur::where('email', $email)->get();
           
            if(count($user) > 0) {
                return header('Location: /register?=message=Email déjà utilisé');
            }


            if($post['role'] == 2) {
                $user = new Utilisateur();
                $user->nom = $post['name'];
                $user->prenom = $post['firstName'];
                $user->email = $post['email'];
                $user->mot_de_passe = password_hash('password', PASSWORD_DEFAULT, ['cost' => 10]);
                $user->profil_image = 'default.png';
                $user->type_utilisateur = 'coach';
                $user->est_complete = 0;
                $user->save();

                $coach = new Coach();
                $coach->id_utilisateur = $user->id;
                $coach->save();

                return header('Location: /login');
            }
            else {
                $user = new Utilisateur();
                $user->nom = $post['name'];
                $user->prenom = $post['firstName'];
                $user->email = $post['email'];
                $user->mot_de_passe = password_hash('password', PASSWORD_DEFAULT, ['cost' => 10]);
                $user->profil_image = 'default.png';
                $user->type_utilisateur = 'client';
                $user->est_complete = 0;
                $user->save();

                $client = new Client();
                $client->id_utilisateur = $user->id;
                $client->save();

                //dd($client);
                return header('Location: /login');
            }

           
        }

        /**
         * 
         * Store a newly created resource in storag$
         * @param array $params
         * @param array $post
         * @return void
         * 
         */
        public function store(array $params = [], array $post = []) {

            $email = $post['email'];
            $password = $post['password'];

            $user = Utilisateur::where('email', $email)->first();

            if(!password_verify($password, $user->mot_de_passe)) {
                // set flash message
                $_SESSION['flash']['danger'] = "Email ou mot de passe incorrect";
                dd("Email ou mot de passe incorrect");
                return header('Location: /login');
            }

            if($user->type_utilisateur === "client") {
                $_SESSION['auth'] = 'client';
                $_SESSION['id'] = $user->id;
                $_SESSION['client_id'] = $user->id;
                // set flash message
                $_SESSION['flash']['success'] = "Vous êtes connecté";
                return header('Location: /profile');
            }
            else {
                $_SESSION['auth'] = 'coach';
                $_SESSION['id'] = $user->id;
                $_SESSION['coach_id'] = $user->id;
                // set flash message
                $_SESSION['flash']['success'] = "Vous êtes connecté";
                return header('Location: /coach/dashboard');
            }
           
        }

        /**
         * 
         * Display the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function show($params = [], $post = []) {
            return $this->render('Auth/profile');
        }

        /**
         * 
         * Show the form for editing the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function edit(array $params = [], array $post = []) {
            echo 'User controller edit method';
        }

        /**
         * 
         * Update the specified resource in storage
         * @param array $params
         * @param array $post
         * @return void
         * 
         */
        public function update(array $params = [], array $post = []) {
            echo 'User controller update method';
        }

        /**
         * 
         * Remove the specified resource from storage
         * @param array $params
         * @return void
         * 
         */
        public function destroy(array $params = []) {
            echo 'User controller destroy method';
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function logout(array $params = []) {
            session_unset();
            session_destroy();
            return header('Location: /');
        }

        /**
         *
         * @param array $post
         * @param array $params
         * @return void
         *
         */
        public function saveImage(array $params = [], array $post = []){
            $target_dir = dirname(__DIR__, 2) . "/public/assets/images/profile/";
            // generate unique name for file
            $uniqid = uniqid();
            $target_file = $target_dir . $uniqid . basename($_FILES["photo"]["name"]);
            //$target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            }
            else {
                dd('error 1');
                $uploadOk = 0;
            }

            if (file_exists($target_file)) {
                dd('error 2');
                $uploadOk = 0;
            }

            if ($_FILES["photo"]["size"] > 500000) {
                dd('error 3');
                $uploadOk = 0;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                dd('error 4');
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                dd('error 5');
                return header('Location: /profile');
            }
            else {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    $user = Utilisateur::where('id', $_SESSION['id'])->first();
                    $user->profil_image = $uniqid.basename($_FILES["photo"]["name"]);
                    $user->save();
                    if($user->type_utilisateur === 'client') {
                        return header('Location: /profile');
                    }
                    else {
                        return header('Location: /coach/dashboard');
                    }
                }
                else {
                    $user = Utilisateur::where('id', $_SESSION['id'])->first();
                    if($user->type_utilisateur === 'client') {
                        return header('Location: /profile');
                    }
                    else {
                        return header('Location: /coach/dashboard');
                    }
                }
            }
        }

    }