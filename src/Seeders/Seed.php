<?php

namespace App\Seeders;

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
            $utilisateur->mot_de_passe = password_hash('password', PASSWORD_DEFAULT, ['cost' => 10]);
            $utilisateur->type_utilisateur = $faker->randomElement(['client', 'coach']);
            $utilisateur->date_naissance = $faker->date();
            $utilisateur->sex = $faker->randomElement(['m', 'f']);
            $utilisateur->save();
        }
    }
}