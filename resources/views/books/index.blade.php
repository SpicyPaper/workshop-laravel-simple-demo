@extends('layout.app')

@section('content')

    <h1>Livres</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary float-right mb-2">Ajouter un livre</a>

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
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->quantity }}</td>

                    <td><a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Afficher</a></td>
                    <td><a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Modifier</a></td>
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {!! $books->links() !!}
    </div>

@endsection
