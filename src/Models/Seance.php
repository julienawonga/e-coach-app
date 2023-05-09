<?php

namespace App\Models;

class Seance extends Model
{
    protected $table = "seances";

    /**
     * @var string[] $fillable
     */
    protected $fillable = ['id_coach', 'id_client', 'date_heure', 'duree', 'tarif', 'est_termine', 'statut', 'meet_link'];

    /**
     * @var string[] $casts
     */
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    /**
     * @var string[] $casts
     */
    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coach::class, 'id_coach');
    }

    /**
     * @var string[] $casts
     */
    public function avis(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Avis::class, "id_seance");
    }
}