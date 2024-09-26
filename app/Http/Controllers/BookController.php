<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // "BookController.index" pour renvoyer 5 éléments uniquements et un numéro de page (pagination)
        //Return all books
        $books = Book::all();

        //Return 5 books per page
        $books = Book::paginate(5);

        return view('books.index', [
          'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get values from the form
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
          'title' => 'required|string|min:5|max:25',
          'pages' => 'required|integer|between:1,999',
          'quantity' => 'required|integer|between:0,99',
        ]);

        // If validation fails, it will automatically redirect back with errors
        // If validation passes, continue with the rest of the code
        if(!$validatedData) {
            return redirect()->back()->withErrors($validatedData);
        }else{
            // Create a new book
            $book = new Book();
            $book->title = $request->title;
            $book->pages = $request->pages;
            $book->quantity = $request->quantity;
            $book->save();
            return redirect()->route('books.index')->with('success', 'Book created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('books.show', [
          'book' => Book::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the book by ID
        return view('books.edit', [
          'book' => Book::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
          'title' => 'required',
          'pages' => 'required',
          'quantity' => 'required',
        ]);

        // Find the book by ID
        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->quantity = $request->quantity;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the book by ID
        $book = Book::findOrFail($id);
        $book->delete();

        // Redirect to the index page with a success message
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
