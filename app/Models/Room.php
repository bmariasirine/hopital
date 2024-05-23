<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'salles';

    // Définir les champs remplissables en masse (Mass Assignment)
    protected $fillable = [
        'nom',
    ];
}
