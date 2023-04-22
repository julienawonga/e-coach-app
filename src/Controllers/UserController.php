<?php
    namespace App\Controllers;

    class UserController extends Controller {

        /**
         * 
         * Display a listing of the resource
         * @param array $params
         * @return void
         * 
         */ 
        public function index($params = [], $post = []) {
            $this->render('User/index');
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
            $this->render('Guest/register');
        }

        /**
         * 
         * Store a newly created resource in storage
         * @param array $params
         * @param array $post
         * @return void
         * 
         */
        public function login($params = [], $post = []) {
            $this->render('Guest/login');
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
            echo 'User controller store method';
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