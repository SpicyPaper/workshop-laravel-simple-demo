@extends("layout.app")

@section("content")

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/books">Back</a>
    </div>
</div>

<form action="/books" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                New book
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="inputTitle">
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputPages">Number of pages</label>
                                <input type="text" name="pages" class="form-control" id="inputPages">
                            </div>
                            <div class="form-group col-6">
                                <label for="inputQuantity">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="inputQuantity">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection