@extends('layout.app')
@section('content')

    <h1>Livres</h1>

    @if($books->isEmpty())
        <div class="alert alert-info">
            Aucun livre à commander
        </div>
    @endif

    <a href="{{ route('books.index') }}" class="btn btn-primary mb-2"><i class="bi bi-book"></i></a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Pages</th>
            <th scope="col">Quantité</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $books->links() !!}
@endsection
