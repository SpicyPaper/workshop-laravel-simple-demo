@extends('layout.app')

@section('content')
    <h1>Books List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary float-right mb-2">Add a Book</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Pages</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
