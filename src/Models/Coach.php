<?php

namespace App\Models;
use App\Models\Utilisateur;
use App\Models\Seance;
use App\Models\Client;
use Illuminate\Support\Facades\Lang;

class Coach extends Model
{
    protected $table = "coachs";

    protected $fillable = ['id_utilisateur', 'specialite', 'description', 'localisation', 'disponibilite','tarif_horaire' ];
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, "id_utilisateur");
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, 'id_coach');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'seances', 'id_coach', 'id_client')
            ->withPivot(['date_heure', 'duree', 'tarif', 'est_termine', 'statut', 'meet_link']);
    }

    // all experiences of a coach
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'id_coach');
    }

    // coach lang
    public function coachLangs()
    {
        return $this->hasMany(CoachLang::class, 'id_coach');
    }

    // coach competances
    public function coachCompetances()
    {
        return $this->hasMany(CoachCompetances::class, 'id_coach');
    }
}