@extends('layout.app')

@section('content')
    <h1>Livres</h1>

    <a href={{ route('books.create') }} class="btn btn-primary mb-2">Ajouter un livre</a>

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
                    @if($book->author_id)
                        <td>{{ $book->author->name }}</td>
                    @else
                        <td>Non renseigné</td>
                    @endif
                    <td>
                        <a href={{ route('books.show', $book->id) }} class="btn btn-info btn-sm">Voir</a>
                        <a href={{ route('books.edit', $book->id) }} class="btn btn-warning btn-sm">Modifier</a>
                        <form action={{ route('books.destroy', $book->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $books->links() !!}
    </div>

@endsection
