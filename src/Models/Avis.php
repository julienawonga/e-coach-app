<?php

namespace App\Models;

class Avis extends Model
{
    protected $table = "avis";

    protected $fillable = ['id_seance', 'note', 'commentaire'];

    public function seance()
    {
        return $this->belongsTo(Seance::class, "id_seance");
    }

}