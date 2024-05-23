<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortieDeces extends Model
{
    use HasFactory;
    protected $fillable = [
        'dh_deces',
        'certificat_deces', // Certificat de décès signé par
        'transfert_corps', // Transfert du corps
        'famille_prevenue', // Famille prévenue
        'famille_presente',
        'id_infirmier', 
        'id_medecin',
        'id_patient',
    ];
}
