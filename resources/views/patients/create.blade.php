@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mb-2">
                <h3>Nouveau patient</h3>
            </div>
            <div class="col-md-6 mb-2 text-right">
                <a href="{{ route('home') }}" class="btn btn-warning rounded-0 mb-2">Annuler</a>
            </div>
            <div class="col-md-12">
                <div class="card border-light shadow rounded-0">

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('patients.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Informations</h4>
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" id="nom" name="nom" class="form-control" required autocomplete="off" value="{{ old('nom') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" id="prenom" name="prenom" class="form-control" required autocomplete="off" value="{{ old('prenom') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input type="date" id="date_naissance" name="date_naissance" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="sit_fam">Situation familiale</label>
                                        <select name="sit_fam" id="sit_fam" class="form-control">
                                            <option value="Célibataire">Célibataire</option>
                                            <option value="Marié">Marié</option>
                                            <option value="NA">NA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region">Région</label>
                                        <select class="js-example-basic-single form-control " name="wilaya_id" required>
                                            <option value="" selected disabled>Choisissez une wilaya</option>
                                            @foreach(\App\Wilaya::all() as $w)
                                                <option value="{{ $w->id }}">{{ $w->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Coordonnées</h4>
                                    <div class="form-group">
                                        <label for="tel">Télephone</label>
                                        <input type="text" id="tel" name="tel" class="form-control" required autocomplete="off" value="{{ old('tel') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Adresse e-mail</label>
                                        <input type="email" id="email" name="email" class="form-control" required autocomplete="off" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success rounded-0">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="{{ asset('js/createPatient.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.form-control').addClass('rounded-0');
            $('.js-example-basic-single').select2();
        })

    </script>
@endsection
