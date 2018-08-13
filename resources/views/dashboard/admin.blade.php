@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <br>
                </center> <div class="card-body">
                <center>Selamat datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang diinginkan.</center>
                <hr>
                <h4>Statistik Penulis</h4>
                <canvas id="chartPenulis" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script>
    var data = {
        labels: {!! json_encode($authors) !!},
        datasets: [{
            label: 'Jumlah buku',
            data: {!! json_encode($books) !!},
            backgroundColor: [
                '#e74c3c',
                '#3498db',
                '#f1c40f',
                '#1abc9c',
                '#2ecc71',
                '#e67e22'
            ],

            borderColor: [
                '#e74c3c',
                '#3498db',
                '#f1c40f',
                '#1abc9c',
                '#2ecc71',
                '#e67e22'
            ],
        }]
    };

var options = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true,
                stepSize: 1
            }
        }]
    }
};

var ctx = document.getElementById("chartPenulis").getContext("2d");

var authorChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});
</script>
@endsection