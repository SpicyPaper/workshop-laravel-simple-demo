@extends("layout.app")
@section("content")
<h1>Livres</h1>

<a href={{ route("books.create") }} class="btn btn-primary mb-2">Ajouter un livre <i class="bi bi-plus-circle-fill"></i></a>

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
            <td>{{ $book->author->name ?? "Pas d'auteur" }}</td>
            <td>
                <form action={{ route("books.destroy", $book->id) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-info" href={{ route("books.show", $book->id) }}><i class="bi bi-box-arrow-up-right"></i></a>
                    <a class="btn btn-primary" href={{ route("books.edit", $book->id) }}><i class="bi bi-pencil-square"></i></a>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
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
