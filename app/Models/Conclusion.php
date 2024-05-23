<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    use HasFactory;
    protected $fillable = [
        'medecinC',
        'medecinCN',
        'residentC',
        'residentCN',
        'conclusionC',
        'gemsa',
        'DP',
        'DAS',
        'CAM',
        'id_infirmier',
        'id_patient',
        'id_medecin',
    ];
}
