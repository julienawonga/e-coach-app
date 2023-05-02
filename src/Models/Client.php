<?php

namespace App\Models;

class Client extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "clients";

    protected $fillable = ['id_utilisateur', 'objectifs', 'niveau_experience'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, "id_utilisateur");
    }

    public function seances()
    {
        return $this->belongsToMany(Seance::class, "clients_seances", "id_client", "id_seance");
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, "id_client");
    }

}