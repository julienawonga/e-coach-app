<?php

namespace App\Models;

class Paiement extends Model
{
    public $table = "paiements";
    public $fillable = ['id_utilisateur', 'id_seance', 'date_paiement', 'mode_paiement', 'montant'];
}