<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Pagination\Paginator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->latest()->paginate(5);
        return view('books.index', compact('books'));
    }
    public function order()
    {
        $books = Book::where('quantity', '<=', 10)->paginate(5);

        return view('order', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all(); // Récupérer tous les auteurs
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|min:1|max:999',
            'quantity' => 'required|integer|min:0|max:99',
            'author_id' => 'nullable|integer|exists:authors,id',
        ]);

        // Création du livre
        Book::create($validated);

        // Redirection avec utilisation du nom de la route
        return redirect()->route('books.index')->with('success', 'Book created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|min:1|max:999',
            'quantity' => 'required|integer|min:0|max:99',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        // Redirection vers la liste des livres avec nom de la route
        return redirect()->route('books.index')->with('success', 'Book updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // Redirection vers la liste des livres avec nom de la route
        return redirect()->route('books.index')->with('success', 'Book deleted successfully !');
    }
}
