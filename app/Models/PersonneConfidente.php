<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonneConfidente extends Model
{
    use HasFactory;
    protected $fillable = [
        'souhaite',
        'genre',
        'nomPC',
        'prenomPC',
        'relation',
        'autres_relation',
        'adressePC',
        'telephonePC',
        'emailPC',
        'directives',
        'exemplaires_directives',
        'date_hospitalisation',
        'lieu_hospitalisation',
        'date_confiance',
        'lieu_confiance',
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
