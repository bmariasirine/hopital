<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortieUHCD extends Model
{
    use HasFactory;
    protected $fillable = [
        'options_uhcd',
        'place_trouvee',
        'date_heure_mutation',
        'mobilitéuhcd',
        'id_medecin',
        'id_infirmier',
        'id_patient',
    ];
}
