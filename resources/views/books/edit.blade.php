@extends('layout.app')

@section('title', 'Edit book')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="/books"> Retour</a>
        </div>
    </div>

    <form action="/books/{{ $book->id }}?_method=PUT" method="POST">
        @csrf

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Modifier un livre
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputTitle">Titre</label>
                        <input type="text" name="title" value="{{ $book->title }}" class="form-control"
                            id="inputTitle">
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="inputPages">Nombre de pages</label>
                            <input type="number" name="pages" value="{{ $book->pages }}" class="form-control"
                                id="inputPages">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputQuantity">Quantité</label>
                            <input type="number" name="quantity" value="{{ $book->quantity }}" class="form-control"
                                id="inputQuantity">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>
                </div>
            </div>
        </div>

    </form>
@endsection
