<?php

namespace App\Models;

class Seance extends Model
{
    protected $table = "seances";

    protected $fillable = ['id_coach', 'id_client', 'date_heure', 'duree', 'tarif', 'est_termine', 'statut', 'meet_link'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class, 'id_coach');
    }

    public function avis()
    {
        return $this->hasOne(Avis::class, "id_seance");
    }
}