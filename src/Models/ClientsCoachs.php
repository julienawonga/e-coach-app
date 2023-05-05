<?php

namespace App\Models;

class ClientsCoachs extends Model
{
    protected $table = "clients_coachs";

    protected $fillable = ['id_client', 'id_coach'];

}