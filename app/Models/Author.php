<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    // TODO-8-5 Relier "Book" et "Author" dans les modèles --> hasMany + belongsTo
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
    use HasFactory;

}
