<?php

namespace App\Models;

class Utilisateur extends Model
{
    /**
     * @var string
     */
    protected $table = "utilisateurs";

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'email', 'mot_de_passe', 'profil_image'];

    /**
     * @var array
     */
    public function client(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Client::class, "id_utilisateur");
    }

    /**
     * @var array
     */
    public function coach(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Coach::class, "id_utilisateur");
    }

    /**
     * @var array
     */
    public function paiement()
    {
        return $this->hasMany(Paiement::class, "id_utilisateur");
    }
}