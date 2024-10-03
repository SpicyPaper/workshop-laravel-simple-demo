@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href={{ route('books.index') }}> Retour</a>
        </div>
    </div>

    <form action={{ route('books.update', $book->id) }} method="POST">
        @csrf
        @method('PUT')

        <div class="card col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card-header">
                Modifier un livre
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputTitle">Titre</label>
                        <input type="text" name="title" value={{ old('title', $book->title) }} class="form-control" id="inputTitle">
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="inputPages">Nombre de pages</label>
                            <input type="text" name="pages" value={{ old('pages', $book->pages) }} class="form-control"
                                id="inputPages">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputQuantity">Quantité</label>
                            <input type="text" name="quantity" value={{ old('quantity', $book->quantity) }} class="form-control"
                                id="inputQuantity">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputAuthor">Auteur</label>
                            <select name="author_id" class="form-control" id="inputAuthor">
                                @foreach ($authors as $author)
                                    <option value={{ $author->id }} {{ $author->id == old('author_id') ? 'selected' : ''}}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Modifier</button>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </form>

@endsection
