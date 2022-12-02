@extends('layout')
@section('dashboard', 'active')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/icon-font.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-6">
            <div class="card-box height-25-p mb-30">
                <a href="{{ route('index.index', ['periode' => date('Y')]) }}"><button type="button"
                        class="btn btn-light btn-lg btn-block">Analisis Kriteria</button></a>
            </div>
        </div>
        <div class="col-6">
            <div class="card-box height-25-p mb-30">
                <a href="{{ route('analisa.index', ['periode' => date('Y')]) }}"><button type="button"
                        class="btn btn-light btn-lg btn-block">Analisis Alternatif</button></a>
            </div>
        </div>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <div>
            <h1 class="font-20 weight-500 mb-10 text-capitalize"><b>Grafik Kinerja Karyawan</b></h1>
            <a>Kurun waktu 2 Tahun</a>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="row">
        <div class=" col-8">
            <div class="card-box pd-20 height-25-p mb-30">
                <h4>10 Karyawan Terbaik {{ date('Y') }}</h4>
                <br>
                <table class="data-table table">
                    <thead>
                        <tr>
                            <th class="datatable-nosort">No</th>
                            <th class="datatable-nosort">NIP</th>
                            <th class="datatable-nosort">Nama Karyawan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasil as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['nip'] }}</td>
                                <td>{{ $item['nama_guru'] }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4">
            <div class="card-box pd-20 height-25-p mb-30">
                <div class="row">
                    <div class="col-8">
                        <h4>Total Karyawan</h4><i class="bi bi-person-badge"></i>
                        <h1><b>{{ $tkaryawan }}</b></h1>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('assets/vendors/images/person-badge.svg') }}" alt="" width="100%"
                            style="opacity: 0.7;">
                    </div>
                </div>
            </div>
            <div class="card-box pd-20 height-25-p mb-30">
                <div class="row">
                    <div class="col-8">
                        <h4>Keterlambatan Tahun ini</h4>
                        <h1><b>{{ $waktu }}</b></h1>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('assets/vendors/images/calendar2-x.svg') }}" alt="" width="100%"
                            style="opacity: 0.7;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/scripts/Chart.js') }}"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    data: [20, 50, 80, 75, 25, 30, 20, 50, 80, 45, 25, 30, 80, 75, 25, 30, 20, 50, 80, 45,
                        25, 30, 80, 75, 25, 30, 20, 50, 80, 45, 25, 30, 80, 75, 25, 30, 20, 50, 80, 45,
                        25, 30, 80, 75, 25, 30, 20, 50, 80, 45, 25, 30, 80, 75, 25, 30, 20, 50, 80, 45,
                        25, 30, 80, 75, 25, 30, 20, 60
                    ],
                    label: "2021",
                }, {
                    data: [20, 57, 10, 48, 20, 20, 20, 50, 100, 75, 70, 30, 80, 75, 25, 30, 20, 50, 80, 45,
                        25, 30, 80, 75, 25, 30, 20, 50, 80, 45, 25, 30, 80, 75, 25, 30, 20, 50, 80, 45,
                        25, 30, 80, 75, 25, 30, 20, 50, 80, 45, 25, 30, 80, 75, 25, 30, 20, 50, 80, 45,
                        25, 30, 80, 75, 25, 30, 20, 60
                    ],
                    label: "2022",
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                    ],
                    borderWidth: 1
                }],
                labels: <?php
                echo $nama_karyawan . ',';
                ?>
            },
            options: {
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
