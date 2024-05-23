<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = [
        'medtrait',
        'nommedresp', 
        'prenommedresp', 
        'addmedresp', 
        'telmedresp', 
        'emailmedresp', 
        'nommedadd', 
        'prenommedadd', 
        'addmedadd', 
        'telmedadd', 
        'emailmedadd', 
        'id_medecin', 
        'id_infirmier', 
        'id_patient',
    ];
}
