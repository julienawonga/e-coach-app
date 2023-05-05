<?php

namespace App\Models;


class CoachLang extends Model
{
    protected $table = "coach_langs";

    protected $fillable = ['id_coach', 'id_lang'];
    public function coach()
    {
        return $this->belongsTo(Coach::class, "id_coach");
    }

    public function lang()
    {
        return $this->belongsTo(CoachLang::class, "id_coach");
    }
}