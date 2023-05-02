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
        public function create($params = [], $post = []) {
            var_dump($post, $params);
            die();
        }

        /**
         * 
         * Store a newly created resource in storage
         * @param array $params
         * @param array $post
         * @return void
         * 
         */
        public function store($params = [], $post = []) {
            $email = $post['email'];
            $password = $post['password'];

            $user = Utilisateur::where('email', $email)->first();

            // if($user == null) die('user not found'); 

            if(!password_verify($password, $user->mot_de_passe)) 
                return header('Location: /login');

            
            if($user->type_utilisateur === 'client') {
                $_SESSION['auth'] = 'client';
                return header('Location: /client/profile?success=true');
            }
            else {
                $_SESSION['auth'] = 'coach';
                return header('Location: /coach/profile?sucess=true');
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
    }