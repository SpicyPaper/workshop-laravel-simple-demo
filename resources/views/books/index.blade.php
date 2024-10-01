@extends('layout.app')

@section('title', 'Books')

@section('content')

    <h1>Livres</h1>

    <a href="/books/create" class="btn btn-primary float-right mb-2"><i class="bi-plus-circle"></i>&nbsp;Ajouter un livre</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Pages</th>
                <th scope="col">Quantité</th>
                <th scope="col">Auteur</th>
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
                        @if (is_null($book->author))
                            Pas d'auteur
                        @else
                            {{ $book->author->name }}
                        @endif
                    </td>
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

    {{ $books->links() }}
@endsection
