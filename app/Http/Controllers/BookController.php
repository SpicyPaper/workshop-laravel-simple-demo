<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|min:5|max:25',
            'pages' => 'required|integer|gt:0|lt:1000',
            'quantity' => 'required|integer|gte:0|lt:100',
         ]);

        $book = new \App\Models\Book();
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->quantity = $request->quantity;
        $book->save();

        return redirect()->route('books.index')
            ->with('success','Book created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validate = $request->validate([
            'title' => 'required|max:255',
            'pages' => 'required|integer|gt:1|lt:1000',
            'quantity' => 'required|integer|gte:0|lt:100',
        ]);
    
        $book = Book::findOrFail($id);
        $book->update($validate);
    
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = \App\Models\Book::find($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success','Book deleted successfully');
    }   
}
