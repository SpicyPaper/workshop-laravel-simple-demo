<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
      $books = Book::all();
      return view('books/index', ['books' => $books]);
    }

    public function create()
    {
      return view('books/create');
    }

    public function store(){
      request()->validate([
        'title' => ['required', 'min:1', 'max:50'],
        'pages' => ['required', 'integer', 'min:10', 'max:2000'],
        'quantity' => ['required', 'integer', 'min:1', 'max:500']
      ]);

      $book = new Book();
      $book->title = request('title');
      $book->pages = request('pages');
      $book->quantity = request('quantity');
      $book->save();
      return redirect('/books')->with('success', 'Book has been added');
    }

    public function edit($id)
    {
      $book = Book::find($id);
      return view('books/edit', ['book' => $book]);
    }

    public function update($id){
      request()->validate([
        'title' => ['required', 'min:1', 'max:50'],
        'pages' => ['required', 'integer', 'min:10', 'max:2000'],
        'quantity' => ['required', 'integer', 'min:1', 'max:500']
      ]);

      $book = Book::findOrFail($id);
      $book->title = request('title');
      $book->pages = request('pages');
      $book->quantity = request('quantity');
      $book->save();
      return redirect('/books')->with('success', 'Book has been updated');
    }

    public function show($id)
    {
      $book = Book::find($id);
      return view('books/show', ['book' => $book]);
    }

    public function destroy($id)
    {
      $book = Book::find($id);
      $book->delete();
      return redirect('/books')->with('success', 'Book has been deleted');
    }
}
