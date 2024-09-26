@extends("layout.app")

@section("content")
<h1>Books</h1>

<a href="books/create" class="btn btn-primary float-right mb-2">Add a book</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Pages</th>
            <th scope="col">Quantity</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->quantity }}</td>
                <td><a class="btn btn-info" href="books/{{ $book->id }}">Show</a></td>
                <td><a class="btn btn-primary" href="books/{{ $book->id }}/edit">Edit</a></td>
                <td>
                    <form action="books/{{ $book->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
