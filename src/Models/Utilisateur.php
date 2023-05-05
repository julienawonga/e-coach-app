<?php

namespace App\Models;

class Utilisateur extends Model
{
    protected $table = "utilisateurs";

    protected $fillable = ['nom', 'prenom', 'email', 'mot_de_passe', 'profil_image'];

    public function client()
    {
        return $this->hasOne(Client::class, "id_utilisateur");
    }

    public function coach()
    {
        return $this->hasOne(Coach::class, "id_utilisateur");
    }

    public function paiement()
    {
        return $this->hasMany(Paiement::class, "id_utilisateur");
    }
}