@extends('layout')
@section('content')
    <div class="card-box pd-10 height-25-p mb-30">
        <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"></i> Back </a>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <form action="{{ route('index.index') }}" method="get">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="periode">Periode </label>
                        <select class="form-control" name="periode" id="periode">
                            @forelse ($periode as $item)
                                <option value="{{ $item }}" @if ($item == request('periode')) selected @endif>
                                    {{ $item }}</option>
                            @empty
                            @endforelse


                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 30px">Cek</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize"><b>Data Alternatif</b></h4>
            {{-- <form action="index/refresh" method="post">
                <a class="btn btn-primary" href="index/refresh" style="float:left;"><i class="fa fa-refresh"
                        aria-hidden="true"></i> Refresh </a>
            </form> --}}
        </div>
        <table class="data-table table">
            <thead>
                <tr>
                    <th class="datatable-nosort">NIK</th>
                    <th>Nama Karyawan</th>
                    <th class="datatable-nosort">Alpha</th>
                    <th class="datatable-nosort">Keterlambatan</th>
                    <th class="datatable-nosort">Kerjasama</th>
                    <th class="datatable-nosort">Sikap Kerja</th>
                    <th class="datatable-nosort">Skill Improve</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($isialter as $row)
                    <tr>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama_guru }}</td>
                        <td>{{ $row->absensi }}</td>
                        <td>{{ $row->waktu_kehadiran }}</td>
                        <td>{{ $row->kerjasama }}</td>
                        <td>{{ $row->sikap_kerja }}</td>
                        <td>{{ $row->skill_improve }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize"><b>Normalisasi Data</b></h4>
        </div>
        <table class="data-table table">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th class="datatable-nosort">Alpha</th>
                    <th class="datatable-nosort">Keterlambatan</th>
                    <th class="datatable-nosort">Kerjasama</th>
                    <th class="datatable-nosort">Sikap Kerja</th>
                    <th class="datatable-nosort">Skill Improve</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arrayabsen as $data)
                    <tr>
                        <td>{{ $data['nama_guru'] }}</td>
                        <td>{{ $data['absen'] }}</td>
                        <td>{{ $data['waktu'] }}</td>
                        <td>{{ $data['kerjasama'] }}</td>
                        <td>{{ $data['sikap'] }}</td>
                        <td>{{ $data['skill'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="myFunction()">Tampilkan Perhitungan</button>
    <br>
    <div id="hitung" style="display:none;">
        <div class="card-box pd-20 height-25-p mb-30">
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize"><b>Normalisasi Matriks</b></h4>
            </div>
            <table class="table">
                <thead>
                    <tr><b>
                            <th>Kriteria</th>
                            <th>Alpha</th>
                            <th>Keterlambatan</th>
                            <th>Kerjasama</th>
                            <th>Sikap Kerja</th>
                            <th>Skill Improve</th>
                        </b></tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($kriteria); $i++) {
                            echo '<tr>';
                            echo '<th>' . $nama_prioritas[$i] . '</th>';
                            for ($j = 0; $j < count($kriteria); $j++) {
                                echo '<td>' . $perbandingan[$i][$j] . '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th><b>TOTAL</b> </th>
                        <?php
                        for ($i = 0; $i < count($perbandingan); $i++) {
                            echo '<th><b>' . $penjumlahan_perbandingan[0][$i] . '</b></th>';
                        }
                        ?>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card-box pd-20 height-25-p mb-30">
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize"><b>Hitung Nilai Normalisasi Matriks</b></h4>
            </div>
            <table class="table">
                <thead>
                    <tr><b>
                            <th>Kriteria</th>
                            <th>Alpha</th>
                            <th>Keterlambatan</th>
                            <th>Kerjasama</th>
                            <th>Sikap Kerja</th>
                            <th>Skill Improve</th>
                        </b></tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($kriteria); $i++) {
                            echo '<tr>';
                            echo '<th>' . $nama_prioritas[$i] . '</th>';
                            for ($j = 0; $j < count($kriteria); $j++) {
                                echo '<td>' . $pembagian_perbandingan[$i][$j] . '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-box pd-20 height-25-p mb-30">
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <b>Maka berikut ini adalah nilai rata – rata dari matrix
                        perbandingan kriteria yaitu sebagai berikut:</b>
                </h4>
                <?php
                $a = 1;
                $b = 1;
                for ($i = 0; $i < count($perbandingan); $i++) {
                    echo 'A' . $a . ' = <b>' . $rata_rata_kriteria[$i][0] . '</b><br>';
                    $a = $a + 1;
                }
                ?>
            </div>
        </div>
        <div class="card-box pd-20 height-25-p mb-30">
            <div class="col-md-4">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <b>Hasil Perkalian Matriks Priorotas Dengan Nilai Rata - Rata :</b>
                </h4>
            </div>
            <div class="row">
                <div class="col-xl-7 mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th rowspan="4">Matriks Prioritas</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                for ($i = 0; $i < count($kriteria); $i++) {
                                    echo '<tr>';
                                    for ($j = 0; $j < count($kriteria); $j++) {
                                        echo '<td>' . $perbandingan[$i][$j] . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-2 mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rata - rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($perbandingan); $i++) {
                                echo '<tr>';
                                echo '<td>' . round($rata_rata_kriteria[$i][0], 2) . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-2 mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($perbandingan); $i++) {
                                echo '<tr>';
                                echo '<td>' . round($perkalian[$i][0], 2) . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-box pd-20 height-25-p mb-30">
            <div class="col-md-4">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <b>Pengujian Konsistensi </b>
                </h4>
            </div>
            <div class="col-md-12">
                <?php
                echo '&lambda;max =';
                for ($i = 0; $i < count($perbandingan); $i++) {
                    if ($i == count($perbandingan) - 1) {
                        echo '(' . round($perkalian[$i][0], 2) . '/' . round($rata_rata_kriteria[$i][0], 2) . ')';
                    } else {
                        echo '(' . round($perkalian[$i][0], 2) . '/' . round($rata_rata_kriteria[$i][0], 2) . ') + ';
                    }
                }
                echo ' / ' . count($perbandingan);
                ?>
            </div>
            <div class="col-md-12">
                <?php
                echo '&lambda;max = ';
                for ($i = 0; $i < count($perkalian); $i++) {
                    if ($i == count($perbandingan) - 1) {
                        echo round($konsistensi[$i][0], 2) . '';
                    } else {
                        echo round($konsistensi[$i][0], 2) . ' + ';
                    }
                }
                echo ' / ' . count($perbandingan);
                ?>
            </div>
            <div class="col-md-12">
                <?php
                echo '&lambda;max = ';
                echo $hkons;
                echo ' / ' . count($perbandingan);
                echo ' = ' . '<b>' . $hasil_lamda . '</b>';
                ?>
                <br>
            </div>
            <div class="col-md-5">
                <br>
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <b>Perhitungan Consistency Index (CI) </b>
                </h4>
            </div>
            <div class="col-md-12">
                <p>CI = (&lambda;max - n) / (n-1)</p>
            </div>
            <div class="col-md-12">
                <?php
                echo 'CI = &lambda;max = ';
                echo '(' . $hkons . ' - ' . count($perbandingan) . ') / (' . count($perbandingan) . ' - 1)';
                echo ' = ' . '<b>' . round($ci, 6) . '</b>';
                ?>
            </div>
            <div class="col-md-5">
                <br>
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <b>Perhitungan Consistency Ratio (CR) </b>
                </h4>
            </div>
            <div class="col-md-12">
                <?php echo 'CR = CI / IR'; ?>
            </div>
            <div class="col-md-12">
                <?php echo 'CR = ' . round($ci, 5) . ' / ' . $tampung_index; ?>
            </div>
            <div class="col-md-12">
                <?php echo 'CR = <b>' . round($cr, 6) . '</b>'; ?>
            </div>
            <div class="col-md-12">
                <?php echo 'CR = <b>' . round($cr, 6) . '</b> < 0,1 <b>(' . $nilai_kon . ')</b>'; ?>
            </div>
        </div>
    </div>
    <!-- js -->
    <!-- <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
            <script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/scripts/Chart.js') }}"></script>
            <script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
            <script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
            <script src="{{ asset('assets/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
            <script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/scripts/dashboard.js') }}"></script> -->
    <script>
        function myFunction() {
            var x = document.getElementById("hitung");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection
