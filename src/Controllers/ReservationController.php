<?php
namespace App\Controllers;
use App\Models\Client;
use App\Models\Coach;
use App\Models\Seance;
use Faker\Factory as Faker;

class ReservationController extends Controller
{
    /**
     * @param array $params
     * @param array $post
     * @return void
     */
    public function store(array $params, array $post){
       
        $this->checkClient();

        $faker = Faker::create('fr_FR');

        $id = $_SESSION['client_id'];
        $client = Client::where('id_utilisateur', $id)->with('utilisateur')->first();
        $coach = Coach::where('id_utilisateur', $params['id'])->with('utilisateur')->first();

        $seance = new Seance();
        $seance->id_coach = $coach->id;
        $seance->id_client = $client->id;
        $seance->date_heure = $post['date'];
        $seance->message = $post['message'];
        $seance->tarif = $coach->tarif_horaire;
        $seance->statut = 'attente';
        $seance->meet_link = 'https://meet.google.com/' . $faker->bothify('????-####-????');;
        $seance->est_termine = 0;
        $seance->save();
        
        header('Location: /profile');
    }
}