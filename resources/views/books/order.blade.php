@extends('layout.app')

@section('content')

@if ($books->count() > 0)
@else
<h3 class="alert alert-info" role="alert">Aucun livre n'a besoin d'être commandé pour l'instant!</h3>
@endif

<h1>Livres à commander</h1>

<a href="{{ route('books.index') }}" class="btn btn-primary float-right mb-2">Retour aux livres</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Pages</th>
            <th scope="col">Quantité</th>
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
{!! $books->links() !!}
@endsection