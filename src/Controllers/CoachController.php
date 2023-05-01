<?php
    namespace App\Controllers;


    class CoachController extends Controller{
        
        public function index($params = []){
            $this->render('Coach/index');
        }

        /**
         * 
         * Display the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function show(){
            $this->render('Coach/profile');
        }

        /**
         * 
         * Display the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function client(){
            $this->render('Coach/members');
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function settings()
        {
            $this->render('Coach/settings');
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function messages()
        {
            $this->render('Coach/messages');
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function chat()
        {
            $this->render('Coach/chat');
        }
    }