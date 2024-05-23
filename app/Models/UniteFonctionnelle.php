<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteFonctionnelle extends Model
{
    use HasFactory;

    // Définir le nom de la table si elle est différente du nom par défaut
    protected $table = 'unitefonctionnelles';

    // Définir les champs remplissables en masse (Mass Assignment)
    protected $fillable = [
        'type_unite',
        'numero',
        'nom_unite',
    ];
}
