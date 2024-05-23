<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenMedical extends Model
{
    use HasFactory;
    protected $fillable = [
        'medecin_exam',
        'nom_medecin',
        'interne_exam',
        'nom_interne',
        'motif_recours_medecin',
        'ccmu',
        'historique_maladie',
        'examen_clinique',
        'id_infirmier',
        'id_patient',
        'id_medecin',
    ];
}
