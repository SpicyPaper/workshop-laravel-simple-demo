@extends('layout.app')

@section('title', 'Create book')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-primary" href="/books"> Retour</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/books" method="POST">
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
                                <input value="{{old('title')}}" type="text" name="title" class="form-control" id="inputTitle">
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    <label for="inputPages">Nombre de pages</label>
                                    <input value="{{old('pages')}}" type="text" name="pages" class="form-control" id="inputPages">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputQuantity">Quantité</label>
                                    <input value="{{old('quantity')}}" type="text" name="quantity" class="form-control" id="inputQuantity">
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="selectAuthor">Titre</label>
                                <select name="author_id" class="form-control" id="selectAuthor">
                                    <option value="">Pas d'auteur</option>
                                    @foreach($authors as $author)
                                        <option @if(old('author_id') == $author->id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
