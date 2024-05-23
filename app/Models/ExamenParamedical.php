<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenParamedical extends Model
{
    use HasFactory;
    protected $fillable = [
        'iao_datetime',
        'iao_user',
        'brancardiao', 
        'filiere',
        'circonstance',
        'motif_recours_iao',
        'motif_acceuil_iao',
        'prise_en_charge_iao',
        'vat_du_jour', 
        'options',
        'id_infirmier',
        'id_patient',
        'id_medecin',
    ];
}
