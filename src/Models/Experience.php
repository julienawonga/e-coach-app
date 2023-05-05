<?php

namespace App\Models;

class Experience extends Model
{
    protected $table = "experiences";

    protected $fillable = ['id_coach', 'titre', 'description','type_experience', 'entreprise','ville', 'pays', 'date_debut', 'date_fin'];


}