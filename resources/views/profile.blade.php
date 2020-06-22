@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mb-2">
                <h3>Mes informations</h3>
            </div>
            <div class="col-md-6 mb-2 text-right">
            </div>
            <div class="col-md-12">
                <div class="card border-light shadow rounded-0">

                    <div class="card-body">
                        <div class="alert alert-warning">
                            <i class="fal fa-exclamation-triangle"></i> Merci de soumettre des informations correctes .
                        </div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                {{ $message }} <br>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{ route('requestEdit') }}" id="edit-password" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <h5>Modifier mon mot de passe</h5>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Nouveau mot de passe" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Confirmer le mot de passe" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <a href="#" onclick="editPassword()" class="btn btn-custom rounded-0"><i class="fal fa-save"></i> Enregistrer</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function editPassword() {
            swal({
                title: "Êtes vous surs ?",
                text: "Si vous modifiez votre mot de passe la session sera fermée, et vous serez déconnecté .",
                icon: "warning",
                buttons: ["Annuler", "Confirmer"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Vous allez être redirigé.", {
                            icon: "success",
                        });
                        document.getElementById('edit-password').submit();;
                    } else {
                        swal("Opération annulée");
                    }
                });
        }


    </script>
@endsection
