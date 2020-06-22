@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 shadow rounded-0">
                    <div class="card-body">
                        <h5>Informations géographiques</h5>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow rounded-0">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($stats_geo->pluck('labels')) !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! json_encode($stats_geo->pluck('data')) !!},
                    backgroundColor: {!! json_encode($stats_geo->pluck('color')) !!},
                    borderColor: {!! json_encode($stats_geo->pluck('color')) !!},
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

@endsection