@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-0 rounded-0 shadow">
            <div class="card-body">
                <h4>Liste des sujets</h4>
                <div class="row">
                    @forelse($patients as $p)
                    <div class="col-md-3">
                            <div class="card  border-light shadow">
                                <div class="card-header">Echantillon #{{$p->id}} | {{ $p->age }} ans</div>
                                <div class="card-body text-center">
                                    @if($p->rapport->ratio !== null)
                                    <p><i class="fal fa-check fa-3x text-success"></i></p>

                                    @else
                                    <p><i class="fal fa-times fa-3x text-warning"></i></p>

                                    @endif
                                    <button class="btn btn-custom rounded-0" onclick="getForm({{$p->id}})"><i class="fal fa-pen"></i> Saisir les résultats</button>
                                </div>
                                <div class="card-footer">
                                    <i class="fal fa-clock text-muted"></i> {{ $p->updated_at->format('d-m à H:i') }}
                                </div>
                            </div>
                    </div>
                    @empty
                        <div class="col-md-12">
                            <div class="alert alert-light shadow-sm">
                               <i class="fal fa-info text-info"></i>  Aucun patient dans la base de données
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div id="modal"></div>

@endsection

@section('scripts')
    <script>
        function getForm(patientID) {
            $.ajax({
                method:'get',
                url: '{{ url("laboratoire/get-form") . '/' }}' + patientID,
                success: function(response){
                    $('#modal').html(response.html);
                    $('#rapportModal').modal('show');
                }
            });
        }
    </script>
@endsection