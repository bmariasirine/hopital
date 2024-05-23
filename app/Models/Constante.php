<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constante extends Model
{
    use HasFactory;
    protected $fillable = [
        'sair',
        'so2',
        'commentaireair',
        'tas',
        'tad',
        'commentaireta',
        'glycemie',
        'commentairegly',
        'pouls',
        'commentairepouls',
        'deg',
        'commentairedeg',
        'echelle',
        'commentaireechelle',
        'fr',
        'commentairefr',
        'id_infirmier',
        'id_patient',
        'id_medecin',
    ];
}
