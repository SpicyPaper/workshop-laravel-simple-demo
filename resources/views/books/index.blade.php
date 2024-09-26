@extends('layout.app')
@section("content")
<h1>Livres</h1>


<a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Ajouter un livre</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Pages</th>
            <th scope="col">Quantité</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td><a href="{{ route('books.show', ['book' => $book->id]) }}">{{$book->title}}</a></td>
            <td>{{$book->pages}}</td>
            <td>{{$book->quantity}}</td>
            <td style="display: flex; justify-content : right; align-items: center;">
                <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-primary" style="margin-right: 10px;">✏️</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $books->links() !!}
@endsection