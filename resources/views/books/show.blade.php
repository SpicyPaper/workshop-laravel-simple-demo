@extends("layout.app")

@section("content")

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/books">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6 offset-0 offset-lg-3">
        <div class="card">
            <div class="card-header">
                Show book
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <strong>Title :</strong>
                        {{ $book->title }}
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <strong>Number of pages :</strong>
                            {{ $book->pages }}
                        </div>
                        <div class="form-group col-6">
                            <strong>Quantity :</strong>
                            {{ $book->quantity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection