<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'pages',
        'quantity',
    ];    
}
