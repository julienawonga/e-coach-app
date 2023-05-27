<?php
    namespace App\Controllers;

    use App\Models\Utilisateur;
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
        public function profile(array $params){
            $this->checkClient();

            (int)$id = $_SESSION['client_id'];
            $client = Client::where('id_utilisateur', $id)->with('utilisateur', 'coachs', 'coachs.utilisateur')->first();

            // check if clien exist
            if($client == null) return header('Location: /login');
            $client = $client->toArray();
            
            return $this->render('Client/profile', compact('client'));
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

            (int)$id = $_SESSION['client_id'];
            $client = Client::where('id_utilisateur', $id)->with('utilisateur', 'coachs', 'coachs.utilisateur')->first();
            if(!$client) return header('Location: /login');
            $client = $client->toArray();

            $this->render('Client/settings',compact('client'));
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function coachs()
        {
            $this->checkClient();
            
            (int)$id = $_SESSION['client_id'];
            $client = Client::where('id_utilisateur', $id)->with('utilisateur', 'coachs', 'coachs.utilisateur')->first();
            if(!$client) return header('Location: /login');
            $client = $client->toArray();

            $this->render('Client/coachs', compact('client'));
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function reserver(array $params)
        {
            $this->checkClient();

            (int)$id_client = $_SESSION['client_id'];
            (int)$id_coach = $params['id'];

            $client = Client::where('id_utilisateur', $id_client)->with('utilisateur')->first()->toArray();
            $coach = Coach::where('id_utilisateur', $id_coach)->with('utilisateur')->first()->toArray();

            $this->render('Client/reserver', compact('coach', 'client'));
        }

        /**
         *
         * Display the specified resource
         * @param array $params
         * @return void
         *
         */
        public function saveUserParams(array $params, array $post){
            $this->checkClient();
            $user = Utilisateur::find($_SESSION['client_id']);

            $user->nom = $post['nom'];
            $user->prenom = $post['prenom'];
            $user->email = $post['email'];
            $user->est_complete = 1;


            $client = Client::where('id_utilisateur', $_SESSION['client_id'])->first();
            $client->objectifs = $post['description'];

            $user->save();
            $client->save();

            return header('Location: /profile/settings');
        }
    }