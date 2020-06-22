@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h4>Liste des utilisateurs</h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="#" class="btn btn-custom rounded-0"  data-toggle="modal" data-target="#newUser"><i class="fal fa-user-plus"></i> Créer</a>
            </div>
        </div>
        <div class="card rounded-0 border-0 shadow">
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse e-mail</th>
                        <th>Affiliation</th>
                        <th>Rôle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->affiliation }}</td>
                            <td>{{ $u->roles->first()->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-custom text-light">
                                <h5 class="modal-title" id="newUserLabel">Nouvel utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('users.store') }}" method="post" id="add-user">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="Nom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Adresse e-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="affiliation" placeholder="Affiliation">
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <select name="role_id" id="" class="form-control" required>
                                                    <option value="" selected disabled>Rôle</option>
                                                    @foreach(\App\Role::all() as $r)
                                                        <option value="{{ $r->id }}">
                                                            {{ $r->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal"><i class="fal fa-times"></i> Fermer</button>
                                <button type="button" class="btn btn-primary rounded-0" onclick="document.getElementById('add-user').submit()"><i class="fal fa-save"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.form-control').addClass('rounded-0');

    </script>
    @if($errors->any())
        <script>
            $('#newUser').modal('show');
        </script>

    @endif
@endsection