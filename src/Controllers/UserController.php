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
                return header('Location: /register');
            }

            if($post['role'] === 2) {
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

                return header('Location: /login');
            }

            if($user->type_utilisateur === "client") {
                $_SESSION['auth'] = 'client';
                $_SESSION['client_id'] = $user->id;
                return header('Location: /profile');
            }
            else {
                $_SESSION['auth'] = 'coach';
                $_SESSION['coach_id'] = $user->id;
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
    }