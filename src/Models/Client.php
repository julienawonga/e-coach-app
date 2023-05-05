<?php

namespace App\Models;

class Client extends \Illuminate\Database\Eloquent\Model
{
    protected $table = "clients";

    protected $fillable = ['id_utilisateur', 'objectifs'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, "id_utilisateur");
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, 'id_client');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, "id_client");
    }

    public function coachs()
    {
        return $this->belongsToMany(Coach::class, 'seances', 'id_client', 'id_coach')
            ->withPivot(['date_heure', 'duree', 'tarif', 'est_termine', 'statut', 'meet_link']);
    }

}