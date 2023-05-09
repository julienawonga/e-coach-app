<?php

namespace App\Models;

class Client extends \Illuminate\Database\Eloquent\Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "clients";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_utilisateur', 'objectifs'];

    /**
     * Get the utilisateur that owns the client.
     */
    public function utilisateur(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, "id_utilisateur");
    }

    /**
     * Get the seances for the client.
     */
    public function seances(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Seance::class, 'id_client');
    }

    /**
     * Get the paiements for the client.
     */
    public function paiements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Paiement::class, "id_client");
    }

    /**
     * Get the coachs for the client.
     */
    public function coachs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Coach::class, 'seances', 'id_client', 'id_coach')
            ->withPivot(['date_heure', 'duree', 'tarif', 'est_termine', 'statut', 'meet_link']);
    }

}