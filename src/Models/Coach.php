<?php

namespace App\Models;
use App\Models\Utilisateur;
use App\Models\Seance;

class Coach extends Model
{
    protected $table = "coachs";

    protected $fillable = ['id_utilisateur', 'specialite', 'description'];
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