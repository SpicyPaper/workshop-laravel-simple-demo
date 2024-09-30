@extends("layout.app")
@section("content")
<h1>Livres</h1>

<a href={{ route("books.create") }} class="btn btn-primary mb-2">Ajouter un livre</a>

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
            <td>pages : {{ $book->pages }}</td>
            <td>quantité : {{ $book->quantity }}</td>
            <td>auteur: {{ $book->author_id ?? "Pas d'auteur" }}</td>
            <td>
                <a class="btn btn-info" href={{ route("books.show", $book->id) }}>Afficher</a>
                <a class="btn btn-primary" href={{ route("books.edit", $book->id) }}>Editer</a>
                <form action={{ route("books.destroy", $book->id) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $books->links() }}
</div>

@endsection
