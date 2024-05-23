<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergie extends Model
{
    use HasFactory;
    protected $fillable = [
        'aucune_allergie_declaree',
        'date_declaration_allergie',
        'allergie_medicaments',
        'autres_allergies',
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
