<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccin extends Model
{
    use HasFactory;
    protected $fillable = [
        'vaccins',
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
