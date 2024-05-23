<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $fillable = [
        'commurg',
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
