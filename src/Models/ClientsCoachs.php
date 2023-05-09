<?php

namespace App\Models;

class ClientsCoachs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "clients_coachs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_client', 'id_coach'];

}