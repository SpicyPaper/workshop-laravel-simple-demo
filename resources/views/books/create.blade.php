@extends("layout.app")
@section("content")
<h1>Créer</h1>
<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href={{ route("books.index") }}> Retour</a>
    </div>
</div>

<form action={{ route("books.store") }} method="POST">
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
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="inputTitle">
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputPages">Nombre de pages</label>
                                <input type="text" name="pages" value="{{old('pages')}}" class="form-control" id="inputPages">
                            </div>
                            <div class="form-group col-6">
                                <label for="inputQuantity">Quantité</label>
                                <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control" id="inputQuantity">
                            </div>
                            <div class="form-group col-12">
                                <label for="selectAuthor">Auteur</label>
                                <select class="form-control" name="author_id" id="selectAuthor">
                                    <option value="">Pas d'auteur</option>
                                    @foreach ($authors as $author)
                                    <option {{(old("author_id") == $author->id ? "selected":"")}} value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
