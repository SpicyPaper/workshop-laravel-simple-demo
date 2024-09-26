<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view("books.index", [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|min:1|max:1000',
            'quantity' => 'required|integer|min:0|max:99'
        ]);
        $book = new Book([
            'title' => $validated["title"],
            'pages' => $validated["pages"],
            'quantity' => $validated["quantity"]
        ]);
        $book->save();

        return redirect()->route("books.index")->with("message", "{$validated['title']} a bien été créé");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view("books.show", ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view("books.edit", ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $title = $request->input("title");
        $pages = $request->input("pages");
        $quantity = $request->input("quantity");

        $book->title = $title;
        $book->pages = $pages;
        $book->quantity = $quantity;
        $book->save();

        return redirect()->route("books.index")->with("message", "$title a bien été mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);

        return redirect()->route("books.index")->with("message", "Le livre a été supprimé");
    }
}
