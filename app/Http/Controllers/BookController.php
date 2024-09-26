<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index')->with('books', Book::with('author')->latest()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create')->with('authors', Author::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|min:1|max:1000',
            'quantity' => 'required|integer|min:0|max:100',
            'author_id' => 'nullable|integer|exists:authors,id',
        ]);

        Book::create([
            'title' => $request->title,
            'pages' => $request->pages,
            'quantity' => $request->quantity,
            'author_id' => $request->author_id,
        ]);

        return redirect('/books')->with('message', "Book created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('books.show')->with('book', Book::whereKey($id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('books.edit')->with('book', Book::whereKey($id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::whereKey($id)->first();

        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->quantity = $request->quantity;

        $book->save();

        return redirect('/books')->with('message', "Book updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::WhereKey($id)->delete();

        return redirect('/books')->with('message', "Book deleted");
    }

    /**
     * Display the books that need to be ordered
     */
    public function order()
    {
        return view('order')->with('books', Book::where('quantity', '<=', 0)->paginate(5));
    }
}
