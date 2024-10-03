@extends('books.index')

@if (!$books->isEmpty())
    @yield('content')
@else
    @section('content')
        <h1>Livres</h1>

        <a href={{ route('books.create') }} class="btn btn-primary mb-2">Ajouter un livre</a>

        <div class="alert alert-info">
            Aucun livre à commander.
        </div>
    @endsection
@endif
