<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = [
        'entree_le',
        'brancard',
        'accompagnant_en_salle_d_attente',
        'mode_entree',
        'mode_consult',
        'mode_transport',
        'prise_en_charge_transport',
        'motif_decrit_par_le_patien',
        'motif_entree_pmsi',
        'id_infirmier',
        'id_patient',
        'id_medecin'
    ];
}
