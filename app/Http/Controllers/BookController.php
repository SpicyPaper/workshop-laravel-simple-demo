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
        return view('/books/index', ['books' => $books]);
    }

    public function store(Request $request)
    {      
        $book = new Book();
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->quantity = $request->input('quantity');

        $book->save();

        return redirect('/books')->with('success', 'Book created successfully');
    }

    public function create()
    {
        return view('books.create');
    }

    public function show(string $id)
    {
        $book = Book::findorfail($id);
        return view('books.show', ['book' => $book]);
        
    }

    public function edit(string $id)
    {
        $book = Book::findorfail($id);
        
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->pages = $request->input('pages');
        $book->quantity = $request->input('quantity');

        $book->save();

        return redirect('/books')->with('success', 'Book edited successfully');
    }

    public function destroy(string $id)
    {
        $book = \App\Models\Book::find($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
