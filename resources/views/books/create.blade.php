@extends("layout.app")

@section("content")

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/books"><i class="bi bi-arrow-left"></i></a>
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
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="inputTitle">
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputPages">Number of pages</label>
                                <input type="text" name="pages" value="{{old('pages')}}" class="form-control" id="inputPages">
                            </div>
                            <div class="form-group col-6">
                                <label for="inputQuantity">Quantity</label>
                                <input type="text" name="quantity"  value="{{old('quantity')}}" class="form-control" id="inputQuantity">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleFormControlSelect1">Auteur</label>
                            <select class="form-control" name="author_id" id="exampleFormControlSelect1">
                                <option value="">Auteur inconnu...</option>
                                @foreach ($authors as $author)
                                    <option value="{{$author->id}}" {{ (old("author_id") == $author->id ? "selected":"") }}>{{$author->name}}</option>
                                @endforeach 
                            </select>
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