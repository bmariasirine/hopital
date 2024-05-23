<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortieTransfert extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination',
    'etablissement-destination',
    'place_trouveeT', 
    'dh-prevueT',
    'patienta', 
    'obc',
    'mobilitétransfert',
    'id_infirmier',
    'id_patient',
    'id_medecin',
    ];
}
