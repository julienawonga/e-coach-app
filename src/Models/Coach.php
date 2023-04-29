<?php

namespace App\Models;

class Coach extends Model
{
    protected $table = "coachs";

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, "id_utilisateur");
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, "id_coach");
    }

//    public function clients()
//    {
//        return $this->belongsToMany(Client::class, "clients_coachs", "id_coach", "id_client");
//    }
//
//    public function paiements()
//    {
//        return $this->hasMany(Paiement::class, "id_coach");
//    }
}