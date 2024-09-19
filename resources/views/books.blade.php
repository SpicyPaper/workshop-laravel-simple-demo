@extends('layout.app')

@section('content')

<h1>Livres</h1>

<a href="#" class="btn btn-primary mb-2">Ajouter un livre</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Pages</th>
            <th scope="col">Quantité</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    {{-- <tbody>
        <tr>
            <td>Harry Potter</td>
            <td>112</td>
            <td>2</td>
            <td>
                --actions--
            </td>
        </tr>
    </tbody> --}}
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->pages}}</td>
            <td>{{$book->quantity}}</td>
            <td>
                {{-- <a href="#" class="btn btn-info btn-sm">Voir</a>
                <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                <a href="#" class="btn btn-danger btn-sm">Supprimer</a> --}}
            </td>
        </tr>
        @endforeach
</table>

@endsection
