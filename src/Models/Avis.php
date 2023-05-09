<?php

namespace App\Models;

class Avis extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "avis";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_seance', 'note', 'commentaire'];

    /**
     * Get the seance that owns the avis.
     */
    public function seance(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Seance::class, "id_seance");
    }

}