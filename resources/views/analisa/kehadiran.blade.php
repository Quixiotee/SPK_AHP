@extends('layout')
@section('content')
    <div class="card-box pd-10 height-25-p mb-30">
        <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"></i> Back </a>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <form action="{{ route('analisa.kehadiran') }}" method="get">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="periode">Periode </label>
                        <select class="form-control" name="periode" id="periode">
                            @forelse (App\Perhitungan::getPeriode() as $item)
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
    <div class="row">
        <div class="col-3">
            <div class="card-box">
                @include('analisa.side')
            </div>
        </div>
        <div class="col-9">
            <div class="card-box">
                <br>
                <center>
                    <h4>Alternatif Kehadiran</h4>
                </center>
                <hr>
                <div class="">
                    <table class="data-table table">
                        <thead>
                            <tr>
                                <th class="datatable-nosort">Alternatif</th>
                                <th class="datatable-nosort">Nilai </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arry_kehadiran as $data)
                                <tr>
                                    <td>{{ $data['nama_guru'] }}</td>
                                    <td>{{ $data['absen'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <div class="table-responsive">
            <h4 class="">Matrix Perbandingan </h4>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ALT</th>
                        <?php
                        $a = 1;
                        for ($i = 0; $i < count($alternatif); $i++) {
                            echo '<th class=' . "'" . 'datatable-nosort' . "'" . '>';
                            echo '<b>K' . $a . '</b>';
                            echo '</th>';
                            $a = $a + 1;
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    for ($i = 0; $i < count($alternatif); $i++) {
                        echo '<tr>';

                        echo '<th> K' . $a . '</th>';
                        for ($j = 0; $j < count($alternatif); $j++) {
                            echo '<td>' . $perbandingan_kehadiran[$i][$j] . '</td>';
                        }
                        $a++;
                    }
                    echo '</tr>';
                    ?>
                </tbody>
                <thead>
                    <tr>
                        <th><b>TOTAL</b> </th>
                        <?php
                        for ($i = 0; $i < count($alternatif); $i++) {
                            echo '<th><b>' . $penjumlahan_perbandingan_kehadiran[0][$i] . '</b></th>';
                        }
                        ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-box pd-20 height-25-p mb-30">
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                <b>Maka berikut ini adalah nilai rata ??? rata dari matrix
                    perbandingan kriteria yaitu sebagai berikut:</b>
            </h4>
            <?php
            $a = 1;
            $b = 1;
            for ($i = 0; $i < count($alternatif); $i++) {
                echo 'A' . $a . ' = <b>' . $rata_rata_kriteria_kehadiran[$i][0] . '</b><br>';
                $a = $a + 1;
            }
            ?>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/vendors/scripts/dashboard.js') }}"></script> -->
    <script></script>
@endsection
