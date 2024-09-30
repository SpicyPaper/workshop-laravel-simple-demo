@extends("layout.app")
@section("content")
<h1>Livre à commander</h1>

<a class="btn btn-primary" href={{ route("books.index") }}> Retour aux livres</a>

@if ($books->count() > 0)
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
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>

@else

    <h2 class="text-success">Aucun livre a besoin d'être commandé</h2>

@endif
@endsection
