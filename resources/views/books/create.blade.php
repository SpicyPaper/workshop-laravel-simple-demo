@extends('layout.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <a class="btn btn-primary" href="/books"> Retour</a>
    </div>
</div>

<form action="/books" method="POST">
    @CSRF

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
                            <input type="text" name="title" class="form-control" id="inputTitle">

                            @if ($errors->has('title'))
                            <div class="alert alert-danger">
                                {{ $errors->first('title') }} <!-- Affiche le premier message d'erreur pour le champ 'title' -->
                            </div>
                            @endif

                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputPages">Nombre de pages</label>
                                <input type="text" name="pages" class="form-control" id="inputPages">

                                @if ($errors->has('pages'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('pages') }} <!-- Affiche le premier message d'erreur pour le champ 'pages' -->
                                </div>
                                @endif

                            </div>
                            <div class="form-group col-6">
                                <label for="inputQuantity">Quantité</label>
                                <input type="text" name="quantity" class="form-control" id="inputQuantity">

                                @if ($errors->has('quantity'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('quantity') }} <!-- Affiche le premier message d'erreur pour le champ 'quantity' -->
                                </div>
                                @endif

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
