@extends('layout.app')

@section('content')

    <h1>Commande</h1>
    @if ($books->count() > 0)
    @else
    <h3 class="text-success">Aucun livre ne doit être commandé !</h3>
    @endif

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
