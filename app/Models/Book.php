<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pages',
        'quantity',
        'author_id',
        // Ajoute ici d'autres champs qui doivent être mass-assignables
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


}
