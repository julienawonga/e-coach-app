<?php
    namespace App\Controllers;

    
    use App\Models\Client;
    use App\Models\Coach;

    class ClientController extends Controller{


        /**
         * 
         * Display the specified resource
         * @param array $params
         * @return void
         * 
         */
        public function show(array $params){
            $this->checkClient();
            (int)$id = $_SESSION['client_id'];
            $client = Client::where('id_utilisateur', $id)->with('utilisateur')->first();
            if(!$client) return header('Location: /login');
            $client = $client->toArray();
            $this->render('Client/profile', compact('client'));
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
            $this->checkClient();
            $this->render('Client/settings');
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function  chat()
        {
            $this->checkClient();
            $this->render('Client/chat');
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
            $this->checkClient();
            $this->render('Client/messages');
        }
    }