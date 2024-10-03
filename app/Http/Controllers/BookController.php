<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * The validation rules.
     */
    private $rules = [
        'title' => 'required|min:5|max:25',
        'pages' => 'required|integer|min:1|max:999',
        'quantity' => 'required|integer|min:0|max:99',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(5);
        return view('books/index', compact('books'));
    }

    /**
     * Display a listing of the resource to order.
     */
    public function order()
    {
        $books = Book::where('quantity', '<=', 0)->paginate(5);
        return view('books/order', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books/create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $book = new Book();
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->quantity = $request->quantity;
        $book->author_id = $request->author_id;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Livre ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books/show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        return view('books/edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->rules);

        $book = Book::find($id);
        $book->title = $request->title;
        $book->pages = $request->pages;
        $book->quantity = $request->quantity;
        $book->author_id = $request->author_id;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Livre modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('books.index')->with('success', 'Livre supprimé');
    }
}
