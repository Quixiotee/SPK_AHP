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
                            <th class="datatable-nosort">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasil as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['nip'] }}</td>
                                <td>{{ $item['nama_guru'] }}</td>
                                <td>{{ $item['jumlah'] }}</td>
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

    <div class="modal fade modalChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style=" max-width: 80%;">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" readonly name="nip" id="nip">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan</label>
                                    <input type="text" class="form-control" readonly name="nama_karyawan"
                                        id="nama_karyawan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periode_1">Periode</label>
                                    <input type="text" class="form-control" readonly name="periode_1" id="periode_1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hasil_1">Hasil</label>
                                    <input type="text" class="form-control" readonly name="hasil_1" id="hasil_1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="chartModal_1"></canvas>
                            </div>
                        </div>

                        <hr>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periode_2">Periode</label>
                                    <input type="text" class="form-control" readonly name="periode_2" id="periode_2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hasil_2">Hasil</label>
                                    <input type="text" class="form-control" readonly name="hasil_2" id="hasil_2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="chartModal_2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/vendors/scripts/Chart.js') }}"></script>
    <script>
        $(document).ready(function() {

            var ctx = document.getElementById("myChart").getContext('2d');

            const ctxModal = document.getElementById('chartModal_1');

            const ctxModal2 = document.getElementById('chartModal_2');

            var myChart;

            var dataset_1 = [];

            $.ajax({
                url: "{{ route('dashboard.chart-kinerja') }}",
                method: "GET",
                async: false,
                success: function(response) {

                    if (response.status) {

                        var nama_karyawan = response.data.nama_karyawan;

                        var periode_1 = response.data.periode_1;

                        var periode_2 = response.data.periode_2;

                        dataset_1 = response.data.dataset_1;

                        var dataset_2 = response.data.dataset_2;

                        var jumlah_1 = [];

                        for (let index = 0; index < dataset_1.length; index++) {
                            const element = dataset_1[index];
                            jumlah_1.push(element.jumlah)
                        }
                        var jumlah_2 = [];
                        for (let index = 0; index < dataset_2.length; index++) {
                            const element = dataset_2[index];
                            jumlah_2.push(element.jumlah)
                        }



                        myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                datasets: [{
                                    data: jumlah_1,
                                    label: periode_1,
                                }, {
                                    data: jumlah_2,
                                    label: periode_2,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(255,99,132,1)',
                                    ],
                                    borderWidth: 1
                                }],
                                labels: nama_karyawan
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
                    }
                }
            })


            document.getElementById("myChart").onclick = function(evt) {

                var activePoints = myChart.getElementsAtEvent(evt);

                if (activePoints.length > 0) {

                    var clickedElementindex = activePoints[0]["_index"];

                    var label = myChart.data.labels[clickedElementindex];

                    var hasil_1 = myChart.data.datasets[0].data[clickedElementindex];

                    var hasil_2 = myChart.data.datasets[1].data[clickedElementindex];

                    var nip = dataset_1[clickedElementindex].nip

                    $('.modalChart').modal('show')


                    $.ajax({
                        url: "{{ route('dashboard.chart-detail') }}",
                        method: "GET",
                        data: {
                            nip: nip
                        },
                        success: function(response) {
                            if (response.status) {

                                var nip = response.data.nip
                                var nama_karyawan = response.data.nama_karyawan

                                $('#nip').val(nip)
                                $('#nama_karyawan').val(nama_karyawan)

                                var periode_1 = response.data.periode_1;
                                var label_1 = response.data.label_1;
                                var absen_1 = response.data.absen_1;
                                var kerjasama_1 = response.data.kerjasama_1;
                                var sikap_kerja_1 = response.data.sikap_kerja_1;
                                var skill_1 = response.data.skill_1;

                                $('#periode_1').val(periode_1)
                                $('#hasil_1').val(hasil_1)

                                new Chart(ctxModal, {
                                    type: 'bar',
                                    data: {
                                        labels: label_1,
                                        datasets: [{
                                                label: 'Absensi',
                                                data: absen_1,
                                                backgroundColor: 'rgba(26, 135, 245, 0.8)',
                                                borderWidth: 1
                                            }, {
                                                label: 'Kerjasama',
                                                data: kerjasama_1,
                                                backgroundColor: 'rgba(245, 26, 26, 0.8)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Sikap Kerja',
                                                data: sikap_kerja_1,
                                                backgroundColor: 'rgba(6, 248, 56, 0.8)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Skill',
                                                data: skill_1,
                                                backgroundColor: 'rgba(102, 6, 248, 0.8)',
                                                borderWidth: 1
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });

                                var periode_2 = response.data.periode_2;
                                var label_2 = response.data.label_2;
                                var absen_2 = response.data.absen_2;
                                var kerjasama_2 = response.data.kerjasama_2;
                                var sikap_kerja_2 = response.data.sikap_kerja_2;
                                var skill_2 = response.data.skill_2;

                                $('#periode_2').val(periode_2)
                                $('#hasil_2').val(hasil_2)

                                new Chart(ctxModal2, {
                                    type: 'bar',
                                    data: {
                                        labels: label_2,
                                        datasets: [{
                                                label: 'Absensi',
                                                data: absen_2,
                                                backgroundColor: 'rgba(26, 135, 245, 0.8)',
                                                borderWidth: 1
                                            }, {
                                                label: 'Kerjasama',
                                                data: kerjasama_2,
                                                backgroundColor: 'rgba(245, 26, 26, 0.8)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Sikap Kerja',
                                                data: sikap_kerja_2,
                                                backgroundColor: 'rgba(6, 248, 56, 0.8)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Skill',
                                                data: skill_2,
                                                backgroundColor: 'rgba(102, 6, 248, 0.8)',
                                                borderWidth: 1
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });


                            }
                        }
                    })

                }
            }






        })
    </script>
@endpush
