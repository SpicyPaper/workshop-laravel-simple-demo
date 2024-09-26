<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function author()
    {
        return $this->belongsTo(Author::class);
    }
    
    protected $fillable = [
        'title', 'pages', 'quantity', 'author_id'
    ];
}
