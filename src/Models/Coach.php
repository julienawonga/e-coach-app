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

    /**
     * Get the seances for the coach.
     *
     * @return string
     */
    public function seances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Seance::class, 'id_coach');
    }

    /**
     * Get the seances for the coach.
     *
     * @return string
     */
    public function clients(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'seances', 'id_coach', 'id_client')
            ->withPivot(['date_heure', 'duree', 'tarif', 'est_termine', 'statut', 'meet_link']);
    }

    /**
     * Get Experiences for the coach.
     *
     * @return string
     */
    public function experiences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Experience::class, 'id_coach');
    }

    /**
     * Get Formations for the coach.
     *
     * @return string
     */
    public function coachLangs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CoachLang::class, 'id_coach');
    }

    /**
     * Get Formations for the coach.
     *
     * @return string
     */
    public function coachCompetances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CoachCompetances::class, 'id_coach');
    }
}