<?php
    namespace App\Controllers;

    class HomeController extends Controller {

        /**
         * 
         * Display a listing of the resource
         * @param array $params
         * @return void
         * 
         */ 
        public function index($params = []) {
            $this->render('Home/index.html.twig');
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
            echo 'Home controller create method';
            var_dump($params, $post);
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
            echo 'Home controller store method';
        }

        /**
         * 
         * Display the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function show($params = []) {
            echo 'Home controller show method';
        }

        /**
         * 
         * Show the form for editing the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function edit($params = [], $post = []) {
            echo 'Home controller edit method';
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
            echo 'Home controller update method';
        }

        /**
         * 
         * Remove the specified resource from storage
         * @param array $params
         * @return void
         * 
         */
        public function destroy($params = []) {
            echo 'Home controller destroy method';
        }
    }