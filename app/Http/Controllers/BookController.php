<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
      $books = Book::latest()->paginate(5);
      return view('books/index', compact('books'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function order(){
      $books = Book::latest()->where('quantity', '<=', 0)->paginate(5);
      return view('order', compact('books'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
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
      $book = Book::findOrFail($id);
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
      $book = Book::findOrFail($id);
      return view('books/show', ['book' => $book]);
    }

    public function destroy($id)
    {
      $book = Book::findOrFail($id);
      $book->delete();
      return redirect('/books')->with('success', 'Book has been deleted');
    }
}
