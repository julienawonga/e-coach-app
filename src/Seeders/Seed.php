<?php

namespace App\Seeders;

use App\Models\Avis;
use App\Models\ClientsCoachs;
use App\Models\Coach;
use App\Models\Client;
use App\Models\CoachLang;
use App\Models\Experience;
use App\Models\Paiement;
use App\Models\Utilisateur;
use App\Models\Seance;
use Faker\Factory as Faker;

class Seed
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        // Création des utilisateurs
        $faker = Faker::create('fr_FR');

        for ($i = 1; $i <= 100; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->id = $i;
            $utilisateur->nom = $faker->lastName;
            $utilisateur->prenom = $faker->firstName;
            $utilisateur->email = $faker->email;
            $utilisateur->mot_de_passe = password_hash('password', PASSWORD_DEFAULT, ['cost' => 10]);
            $utilisateur->profil_image = $faker->randomElement(['https://randomuser.me/api/portraits/men/' .$i. '.jpg', 'https://randomuser.me/api/portraits/women/' .$i. '.jpg']);
            $utilisateur->type_utilisateur = $faker->randomElement(['client', 'coach']);
            $utilisateur->date_naissance = $faker->date();
            $utilisateur->sex = $faker->randomElement(['m', 'f']);
            $utilisateur->save();
        }

        $utilisateurs = Utilisateur::all();
        $i = 1; $j = 1;

        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur->type_utilisateur == 'client') {
                $client = new Client();
                $client->id = $i;
                $client->id_utilisateur = $utilisateur->id;
                $client->objectifs = $faker->randomElement(['stress', 'depression', 'anxiete', 'traumatisme', 'relation']);
                $client->save();
            } else {
               $coach = new Coach();
                $coach->id = $j;
                $coach->id_utilisateur = $utilisateur->id;
                $coach->tarif_horaire = $faker->randomFloat(2, 10, 100);
                $coach->localisation = $faker->city;
                $coach->disponibilite = $faker->randomElement([0, 1]);
                $coach->specialite = $faker->randomElement(
                    [
                        'Coach en Gestion du stress',
                        'Coach en Développement personnel',
                        'Coach en Gestion de la dépression',
                        'Coach en Gestion de l\'anxiété',
                        'Coach en Relations interpersonnelles',
                        'Coach en Gestion des traumatismes',
                    ]
                );
                $coach->description = $faker->text;
                $coach->save();
            }
            $i++; $j++;
        }

        // creation des experiences
        $coachs = Coach::all();
        $i = 1;
        foreach ($coachs as $coach) {
            $experience = new Experience();
            $experience->id = $i;
            $experience->id_coach = $coach->id_utilisateur;
            $experience->titre = $faker->sentence;
            $experience->type_experience = $faker->randomElement(['formation', 'experience']);
            $experience->entreprise = $faker->company;
            $experience->ville = $faker->city;
            $experience->pays = $faker->country;
            $experience->date_debut = $faker->date();
            $experience->date_fin = $faker->date();
            $experience->description = $faker->text;
            $experience->save();
            $i++;
        }


        // Création des séances
        $clients = Client::all();
        $coachs = Coach::all();
        $i = 1;
        for ($i = 1; $i <= 30; $i++) {
            $seance = new Seance();
            $seance->id = $i;
            $seance->id_coach = $faker->randomElement($coachs)->id_utilisateur;
            $seance->id_client = $faker->randomElement($clients)->id_utilisateur;
            $seance->est_termine = $faker->randomElement([0, 1]);
            $seance->statut = $faker->randomElement(['attente', 'accepte', 'refuse']);
            $seance->meet_link = 'https://meet.google.com/' . $faker->bothify('????-####-????');
            $seance->date_heure = $faker->dateTimeBetween('now', '+1 years');
            $seance->duree = $faker->randomElement([30, 60, 90]);
            $seance->tarif = $faker->randomElement([30, 60, 90]);
            $seance->save();
        }

        // Création des paiements
        $seances = Seance::all();
        $i = 1;
        foreach ($seances as $seance) {
            $paiement = new Paiement();
            $paiement->id = $i;
            $paiement->id_utilisateur = $seance->id_client;
            $paiement->id_seance = $seance->id;
            $paiement->date_paiement = $faker->dateTimeBetween($seance->date_heure, '+1 years');
            $paiement->montant = $seance->tarif;
            $paiement->save();
            $i++;
        }

        // Création des avis
        $i = 1;
        foreach ($seances as $seance) {
            $avis = new Avis();
            $avis->id = $i;
            $avis->id_seance = $seance->id;
            $avis->note = $faker->randomElement([1, 2, 3, 4, 5]);
            $avis->commentaire = $faker->text;
            $avis->save();
            $i++;
        }

        // creation des langues
        $coachs = Coach::all();
        $i = 1;
        foreach ($coachs as $coach) {
            $langue = new CoachLang();
            $langue->id = $i;
            $langue->id_coach = $coach->id_utilisateur;
            $langue->langue = $faker->randomElement(['francais', 'anglais']);
            $langue->save();
            $i++;
        }

        foreach ($coachs as $coach) {
            $langue = new CoachLang();
            $langue->id = $i;
            $langue->id_coach = $coach->id_utilisateur;
            $langue->langue = $faker->randomElement(['espagnol', 'italien']);
            $langue->save();
            $i++;
        }
    }
}