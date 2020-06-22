@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6 mb-2">
            <h3>Liste des patients</h3>
        </div>
        <div class="col-md-6 mb-2 text-right">
            <a href="{{ route('patients.create') }}" class="btn btn-custom rounded-0 mb-2">Nouveau</a>
        </div>
        <div class="col-md-12">
            <div class="card border-light shadow rounded-0">

                <div class="card-body">
                    <table class="table table-sm table-striped table-borderless">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date de naissance</th>
                            <th>Situation familiale</th>
                            <th>Créé par</th>
                            <th>Région</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($patients as $p)
                            <tr>
                                <td>
                                    <a href="{{route('patients.show',$p->id)}}">{{$p->nom_complet}}</a>
                                </td>
                                <td>{{ $p->date_naissance->format('d-m-Y') }}</td>
                                <td>{{ $p->sit_fam }}</td>
                                <td>{{ $p->user->name }} ( {{ $p->user->roles->first()->description }} )</td>
                                <td>{{ $p->wilaya->nom }}</td>
                                <td>
                                    <a href="{{ route('patients.delete',$p->id) }}" class="badge badge-danger rounded-0"><i class="fal fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucun patient</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            {{ $patients->links() }}
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
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue !'
            }
        })
    </script>
@endsection
