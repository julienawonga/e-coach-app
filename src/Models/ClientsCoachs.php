<?php

namespace App\Models;

class Clients_Coachs extends Model
{
    protected $table = "clients_coachs";

    protected $fillable = ['id_client', 'id_coach'];

}