<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortieMutation extends Model
{
    use HasFactory;
    protected $fillable = [
    'specialite',// Spécialité de la responsabilité médicale
    'responsabilite-hebergement', // Responsabilité d'hébergemen
    'placetrouveeM', // Place trouvée
    'dhprevueT', // Date et heure prévue de transfer
    'mobiliteM',
    'id_infirmier',
    'id_patient',
    'id_medecin',
    ];
}
