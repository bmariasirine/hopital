<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    use HasFactory;
    protected $fillable = [
        'aucuneante',
        'dateantc', 
        'amedForma', 
        'achirForma',
        'afamForma', 
        'autresForma',
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
