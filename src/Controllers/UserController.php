<?php
    namespace App\Controllers;
    use App\Models\Utilisateur;

    class UserController extends Controller {

        /**
         * 
         * Display a listing of the resource
         * @param array $params
         * @return void
         * 
         */ 
        public function index($params = [], $post = []) {
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
            dd($user);
        }

        /**
         * 
         * Store a newly created resource in storag$
         * @param array $params
         * @param array $post
         * @return void
         * 
         */
        public function store($params = [], $post = []) {

            $email = $post['email'];
            $password = $post['password'];

            $user = Utilisateur::where('email', $email)->first();

            if(!password_verify($password, $user->mot_de_passe)) 
                return header('Location: /login');


            if($user->type_utilisateur === 'client') {
                $_SESSION['auth'] = 'client';
                $_SESSION['client_id'] = $user->id;
                header('Location: /profile');
            }
            else {
                $_SESSION['auth'] = 'coach';
                $_SESSION['coach_id'] = $user->id;
                header('Location: /coach/dashboard');
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
            $this->render('Auth/profile');
        }

        /**
         * 
         * Show the form for editing the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function edit($params = [], $post = []) {
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
        public function update($params = [], $post = []) {
            echo 'User controller update method';
        }

        /**
         * 
         * Remove the specified resource from storage
         * @param array $params
         * @return void
         * 
         */
        public function destroy($params = []) {
            echo 'User controller destroy method';
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function logout($params = []) {
            session_unset();
            session_destroy();
            header('Location: /');
        }
    }