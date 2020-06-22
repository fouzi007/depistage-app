@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mb-2">
                <h3>Fiche # {{ $patient->id }}</h3>
            </div>
            <div class="col-md-6 mb-2 text-right">
                <a href="{{ route('home') }}" class="btn btn-warning rounded-0 mb-2">Retour</a>
            </div>
            <div class="col-md-12">
                <div class="card border-light shadow ">

                    <div class="card-body">
                        <h4>{{ $patient->nom_complet }}</h4>
                        <p>Date de naissance (Age) : <strong>{{ $patient->age_info }}</strong></p>
                        <p>Situation familiale: <strong>{{ $patient->sit_fam }}</strong></p>
                        <p>Télephone: <strong>{{ $patient->tel }}</strong></p>
                        <p>E-mail: <strong>{{ $patient->email }}</strong></p>
                        <p>Localisation: <strong>{{ $patient->wilaya->nom }}</strong></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Signes du bas appareil urinaire <a href="#" class="text-muted" onclick="$('#sbau').collapse('toggle');" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Voir le rapport"><small><i class="fal fa-plus-circle"></i></small></a></h4>
                                <div class="collapse {{ $showform == true ? 'show' : '' }}" id="sbau">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sbau"  id="dysurie"  {{ $patient->sbau->dysurie == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="dysurie" name="dysurie" >Dysurie</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sbau" id="hematurie" {{ $patient->sbau->hematurie == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="hematurie" name="hematurie">Hématurie</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sbau" id="pollakiurie" {{ $patient->sbau->pollakiurie == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="pollakiurie" name="pollakiurie">Pollakiurie</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sbau" id="hemospermie" {{ $patient->sbau->hemospermie == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="hemospermie" name="hemospermie">Hémospermie</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sbau" id="aucun" {{ $patient->sbau->aucun == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="aucun" name="aucun">Aucun</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input sbau" id="ts" {{ $patient->sbau->ts == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="ts" name="ts">Troubles Sexuels</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Toucher Rectal <a href="#" class="text-muted" onclick="$('#tr').collapse('toggle');"><small><i class="fal fa-plus-circle"></i></small></a></h4>
                                <div class="collapse" id="tr">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input tr" id="pr" {{ $patient->tr->pr == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="pr" name="pr">Prostate ferme</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input tr" id="pd" {{ $patient->tr->pd == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="pd" name="pd">Prostate dure</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input tr" id="np" {{ $patient->tr->np == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="np" name="np">Nodule palpable</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input tr" id="normal" {{ $patient->tr->normal == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="normal" name="normal">Normal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <hr>
                                <h4 class="text-center">Compte-rendu laboratoire</h4>
                                <h5>Antigène Prostatique Spécifique</h5>
                                <ul>
                                    <li>PSA Totale: <strong>{{ $patient->rapport->psa_totale ? $patient->rapport->psa_totale . ' ng/ml' : 'NA'  }}</strong></li>
                                    <li>PSA Libre: <strong>{{ $patient->rapport->psa_libre ? $patient->rapport->psa_libre . ' ng/ml' : 'NA' }}</strong></li>
                                    <li>Ratio: <strong>{{ $patient->rapport->ratio ? $patient->rapport->ratio . ' %' : 'NA' }} </strong></li>
                                </ul>
                                <h5 class="mt-3">Observations</h5>
                                <div class="card">
                                    <div class="card-body">
                                        {!!  $patient->rapport->observations ? $patient->rapport->observations : '<p class="text-muted"> Aucun rapport rédigé </p>' !!}
                                    </div>
                                </div>
                                <h5 class="mt-3">Orientation</h5>
                                <ul>
                                    <li>Surveillance régulière <i class="fal {{ $patient->rapport->surv_reguliere  == 1 ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }}"></i> </li>
                                    <li>Adresser un urologue <i class="fal {{ $patient->rapport->adresser_urologue == 1 ? 'fa-check-circle text-success' : 'fa-times-circle text-danger' }}"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script>
        $(".sbau").change(function() {
            if(this.checked && this.id !== 'aucun') {
                $('#aucun').prop("checked", false);
                $.ajax({
                    method:'get',
                    url: '{{ url('sbau/') }}' + '/{{ $patient->id }}/' + this.id + '/activate',
                    success:function(response){
                        $.notify(response.info + " mis à jour",{
                            globalPosition: 'bottom center',
                            className: "success"
                        });
                    }
                });

            }
            else if(this.checked && this.id == 'aucun') {
                $('.sbau').prop('checked', false);
                $(this).prop('checked', true);
                $.ajax({
                    method:'get',
                    url: '{{ url('sbau/') }}' + '/{{ $patient->id }}/' + this.id + '/activate',
                    success:function(response){
                        $.notify("Diagnostic effacé !",{
                            globalPosition: 'bottom center',
                            className: "success"
                        });
                    }
                });

            }
            else {
                $.ajax({
                    method:'get',
                    url: '{{ url('sbau/') }}' + '/{{ $patient->id }}/' + this.id + '/desactivate',
                    success:function(response){
                        $.notify(response.info + " mis à jour",{
                            globalPosition: 'bottom center',
                            className: "success"
                        });
                    }
                });
            }
        });

        $(".tr").change(function() {
           if(this.checked && this.id == 'normal') {
               axios.get('{{ url('tr/') }}' + '/{{ $patient->id }}/' + this.id + '/activate').then((response) => {
                   $('.tr').prop('checked', false);
                   $(this).prop('checked', true);
                   $.notify("Toucher rectal mis à jour",{
                       globalPosition: 'bottom center',
                       className: "success"
                   });
               })
           }
           else {
               axios.get('{{ url('tr/') }}' + '/{{ $patient->id }}/' + this.id + '/activate').then((response) => {
                   $('#normal').prop('checked', false);
                   $.notify("Toucher rectal mis à jour",{
                       globalPosition: 'bottom center',
                       className: "success"
                   });
               })
           }
        });
    </script>
@endsection
