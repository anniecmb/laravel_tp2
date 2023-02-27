<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'name',
        'adresse',
        'telephone',
        'email',
        'naissance',
        'ville_id'
    ];

    public function etudiantHasVille() {

        // $this réfère à la class Utilisateur
        //                         model,         PK,      FK
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
}
