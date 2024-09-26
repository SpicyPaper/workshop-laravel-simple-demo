<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pages',
        'quantity',
        // Ajoute ici d'autres champs qui doivent être mass-assignables
    ];
}
