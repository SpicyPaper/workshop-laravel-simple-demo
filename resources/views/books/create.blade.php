@extends('layout.app')
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="{{ route('books.index') }}"><i class="bi bi-arrow-left"></i></a>
    </div>
</div>

<form action="{{ route('books.store' ) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Nouveau livre
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputTitle">Titre</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" value="{{ old('title') }}">
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputPages">Nombre de pages</label>
                                <input type="text" name="pages" class="form-control" id="inputPages" value="{{ old('pages') }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="inputQuantity">Quantité</label>
                                <input type="text" name="quantity" class="form-control" id="inputQuantity" value="{{ old('quantity') }}">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="inputAuthor">Auteur</label>
                            <select name="author_id" class="form-control" id="inputAuthor">
                                <option value="">Choisir un auteur</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? "selected" : "" }}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-check"></i></button>
                    </div>
                    @if($errors)
                        <br>
                        @foreach($errors->all() as $error)
                            <li class="alert alert-danger">
                                <i class="bi bi-exclamation-square"></i> {{ $error }}
                            </li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
