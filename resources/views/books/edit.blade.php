@extends("layout.app")

@section("content")

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/books"><i class="bi bi-arrow-left"></i></a>
    </div>
</div>

<form action="/books/{{ $book->id }}" method="POST">
    @csrf
    @method("PUT")
    
    <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
        <div class="card-header">
            Edit book
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputTitle">Title</label>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control" id="inputTitle">
                </div>
                <div class="row mt-3">
                    <div class="form-group col-6">
                        <label for="inputPages">Number of pages</label>
                        <input type="text" name="pages" value="{{ $book->pages }}" class="form-control" id="inputPages">
                    </div>
                    <div class="form-group col-6">
                        <label for="inputQuantity">Quantity</label>
                        <input type="text" name="quantity" value="{{ $book->quantity }}" class="form-control" id="inputQuantity">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </div>
        </div>
    </div>

</form>

@endsection