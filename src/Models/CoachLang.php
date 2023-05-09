<?php

namespace App\Models;


class CoachLang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "coach_langs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_coach', 'id_lang'];

    /**
     * Get the coach that owns the coach_lang.
     */
    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coach::class, "id_coach");
    }

    /**
     * Get the lang that owns the coach_lang.
     */
    public function lang(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CoachLang::class, "id_coach");
    }
}