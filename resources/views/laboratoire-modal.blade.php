<div class="modal fade bd-example-modal-xl" id="rapportModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Soumettre rapport d'analyse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Echantillon # {{ $rapport->patient_id }}</h4>
                <form action="{{ url('laboratoire/update',$rapport->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="psa_totale">PSA Totale</label>
                                <input type="number" name="psa_totale" id="psa_totale" class="form-control" placeholder="PSA Totale" value="{{ $rapport->psa_totale }}">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="psa_libre">PSA Libre</label>
                                <input type="number" name="psa_libre" id="psa_libre" class="form-control" placeholder="PSA Libre" value="{{ $rapport->psa_libre }}">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ratio">Ratio</label>
                                <input type="number" class="form-control" id="ratio" placeholder="Ratio" disabled value="{{$rapport->ratio}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group">
                                <textarea name="observations" id="" class="form-control">{{$rapport->observations}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3"><input type="reset" class="btn btn-warning btn-block"></div>
                        <div class="col-md-6 mt-3"><button role="button" class="btn btn-success btn-block">Enregistrer</button></div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    $('#psa_totale').keyup(function(){
        $('#ratio').val($('#psa_libre').val() / $(this).val())
    })
    $('#psa_libre').keyup(function(){
        $('#ratio').val($(this).val() / $('#psa_totale').val())
    })


    $('.form-control').addClass('rounded-0');
</script>