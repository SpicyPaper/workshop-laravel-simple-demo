@extends('layout.app')  <!-- Extends the main layout -->

@section('content')
    <h1>Livres</h1>

    <!-- Bouton pour ajouter un nouveau livre -->
    <a href="{{ route('books.create') }}" class="btn btn-primary float-right mb-2">Ajouter un livre</a>

    <!-- Tableau des livres -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Pages</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book) 
                <tr>
                    <td>{{ $book->title }}</td>  
                    <td>{{ $book->pages }}</td>  
                    <td>{{ $book->quantity }}</td>  
                    <!-- Actions pour chaque livre -->
                    <td>
                        <a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Afficher</a>
                        <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Modifier</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
