@extends('layout.app')

@section('title', 'Commander')

@section('content')

    <h1>Livres à commander</h1>

    @if(sizeof($books) == 0)
        <p>Aucun livre à commander</p>
    @else
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
                <td>{{ $book->title }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->quantity }}</td>
                <td>
                    <a class="btn btn-info" href="/books/{{ $book->id }}"><i class="bi-eye"></i>&nbsp;Afficher</a>
                    <a class="btn btn-primary" href="/books/{{ $book->id }}/edit"><i class="bi-pencil-square"></i>&nbsp;Modifier</a>
                    <form action="/books/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi-trash"></i>&nbsp;Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif

    {{ $books->links() }}
@endsection
