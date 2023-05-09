<?php

namespace App\Models;

class Experience extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "experiences";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_coach', 'titre', 'description','type_experience', 'entreprise','ville', 'pays', 'date_debut', 'date_fin'];


}