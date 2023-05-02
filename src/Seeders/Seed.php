<?php

namespace App\Seeders;

use App\Models\Coach;
use App\Models\Client;
use App\Models\Utilisateur;
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
        $faker = Faker::create();

        for ($i = 0; $i <= 10; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->id = $i;
            $utilisateur->nom = $faker->lastName;
            $utilisateur->prenom = $faker->firstName;
            $utilisateur->email = $faker->email;
            $utilisateur->est_admin = $faker->randomElement([0, 1]);
            $utilisateur->mot_de_passe = password_hash('password', PASSWORD_DEFAULT, ['cost' => 10]);
            $utilisateur->type_utilisateur = $faker->randomElement(['client', 'coach']);
            $utilisateur->date_naissance = $faker->date();
            $utilisateur->sex = $faker->randomElement(['m', 'f']);
            $utilisateur->save();
        }
        $utilisateurs = Utilisateur::all();
        $i = 0; $j = 0;
        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur->type_utilisateur == 'client') {
                $client = new Client();
                $client->id = $i;
                $client->id_utilisateur = $utilisateur->id;
                $client->objectifs = $faker->randomElement(['perte de poids', 'prise de masse', 'remise en forme']);
                $client->niveau_experience = $faker->randomElement(['debutant', 'intermediaire', 'confirme']);
                $client->save();
            } else {
               $coach = new Coach();
                $coach->id = $j;
                $coach->id_utilisateur = $utilisateur->id;
                $coach->specialite = $faker->randomElement(['perte de poids', 'prise de masse', 'remise en forme']);
                $coach->description = $faker->text;
                $coach->save();
            }
            $i++; $j++;
        }
    }
}