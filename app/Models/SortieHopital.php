<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortieHopital extends Model
{
    use HasFactory;
    protected $fillable = [
        'orientationsortie',
        'personne-prevenue',
        'certificat-refus',
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
