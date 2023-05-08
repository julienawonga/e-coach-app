<?php
    namespace App\Controllers;
    use App\Models\Seance;
    use App\Controllers\Controller;
    class SeanceController extends Controller{

        /**
         * @param array $params
         * @param array $post
         * @return void
         */
        public function confirmer(array $params = [], array $post = []): void{
            $this->checkCoach();
            $seance = Seance::where('id', $params['id'])->first();
            $seance->statut = 'accepte';
            $seance->save();
            header('Location: /coach/seances');
        }

        /**
         * @param array $params
         * @param array $post
         * @return void
         */
        public  function annuler(array $params = [], array $post = []): void{
            $this->checkCoach();
            $seance = Seance::where('id', $params['id'])->first();
            $seance->statut = "refuse";
            $seance->save();
            header('Location: /coach/seances');
        }

        /**
         * @param array $params
         * @param array $post
         * @return void
         */
        public function terminer(array $params = [], array $post = []): void{
            $this->checkCoach();
            $seance = Seance::where('id', $params['id'])->first();
            $seance->est_termine = 1;
            $seance->save();
            header('Location: /coach/seances');
        }
    }