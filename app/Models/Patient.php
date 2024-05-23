<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'nomJeuneFille',
        'lieuNaissance',
        'telephone',
        'email',
        'prenom',
        'dateNaissance',
        'adresse',
        'numeroAssurance',
        'sexe',
        'id_medecin',
        'id_infirmier',
        'salle_id',
    ];
}
