<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }
}
