@extends('layout.app')

@section ('content')
<div>

    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Retour</a>
        </div>
    </div>

    <form action="{{ route('books.store')}}" method="POST">
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Nouveau livre
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                @csrf
                                <label for="inputTitle">Titre</label>
                                <input type="text" name="title" class="form-control" id="inputTitle" value="Titre" required>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    @csrf
                                    <label for="inputPages">Nombre de pages</label>
                                    <input type="text" name="pages" class="form-control" id="inputPages" required>
                                </div>
                                <div class="form-group col-6">
                                    @csrf
                                    <label for="inputQuantity">Quantité</label>
                                    <input type="text" name="quantity" class="form-control" id="inputQuantity" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection