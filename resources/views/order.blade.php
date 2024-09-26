@extends("layout.app")
@section("content")
<h1>Livres commandés</h1>

@if($books->isEmpty())
    <p>Aucun livre ne doit être commandé.</p>
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
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
    @endif
@endsection
