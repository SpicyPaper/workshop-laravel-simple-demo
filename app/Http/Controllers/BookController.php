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
        $books = Book::paginate(5);
        return view('books.index', compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:25',
            'pages' => 'required|integer|min:0|max:1000',
            'quantity' => 'required|integer|min:0|max:99',
        ]);
    
        $book = new Book();
        $book->title = $validated['title'];
        $book->pages = $validated['pages'];
        $book->quantity = $validated['quantity'];
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
