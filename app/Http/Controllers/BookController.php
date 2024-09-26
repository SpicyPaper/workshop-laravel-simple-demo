<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = \App\Models\Book::with('author')->paginate(5);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function order()
    {
        $books = \App\Models\Book::where('quantity', '<=', 0)->paginate(5);

        return view('order', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = \App\Models\Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|min:0|max:1000',
            'quantity' => 'required|integer|min:0|max:100',
            'author_id' => 'nullable|integer|exists:authors,id'
        ]);
        \App\Models\Book::create($request->all());
        return redirect()->route('books.index')->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('books.show', [
            'book' => \App\Models\Book::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('books.edit', [
            'book' => \App\Models\Book::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|min:0|max:1000',
            'quantity' => 'required|integer|min:0|max:100'
        ]);
        \App\Models\Book::find($id)->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \App\Models\Book::find($id)->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
