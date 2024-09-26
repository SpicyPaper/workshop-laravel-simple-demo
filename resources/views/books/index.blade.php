@extends("layout.app")
@section("content")
<h1>Livres</h1>
<a href="{{route('books.create')}}" class="btn btn-primary float-right mb-2">Ajouter un livre</a>

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
                <a href="{{route('books.show', $book->id)}}" class="btn btn-info">Afficher</a>
                <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">Editer</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')<button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $books->links() }}
@endsection
