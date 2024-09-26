@extends("layout.app")

@section("content")
<h1>Order</h1>

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
        @forelse ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->quantity }}</td>
            </tr>
        @empty
            <tr>
                <p>No books need to be ordered.</p>
            </tr>
        @endforelse
    </tbody>
</table>
    
{!! $books->links() !!}

@endsection
