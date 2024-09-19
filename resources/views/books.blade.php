@extends('layout.app')

@section('content')
    <h1>Books List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Pages</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
