@extends('layout')
@section('laporan-perangkingan', 'active')
@section('content')
    <!-- Datatable start -->
    <div class="card-box pd-20 height-25-p mb-30">
        <form action="{{ route('laporan.perangkingan.index') }}" method="get">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="periode_awal">Periode Awal</label>
                        <input type="date" class="form-control" id="periode_awal" required name="periode_awal">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="periode_akhir">Periode Akhir</label>
                        <input type="date" class="form-control" id="periode_akhir" required name="periode_akhir">
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary ">Cek</button>
                    <button type="submit" id="btnCetak" class="btn btn-primary  btn-info">Cetak PDF</button>
                </div>

            </div>
        </form>
    </div>
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Laporan Perangkingan</h4>
        </div>
        <div class="pb-20">
            <table class="data-table table">
                <thead>
                    <tr>
                        <th class="datatable-nosort">No</th>
                        <th class="datatable-nosort">NIP</th>
                        <th class="datatable-nosort">Nama Karyawan</th>
                        <th class="datatable-nosort">Hasil</th>
                        <th class="datatable-nosort">Periode</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['nip'] }}</td>
                            <td>{{ $item['nama_guru'] }}</td>
                            <td>{{ $item['jumlah'] }}</td>
                            <td>{{ $item['periode'] }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Datatable End -->
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            $('#btnCetak').on('click', function() {
                var periode_awal = $('#periode_awal').val()
                var periode_akhir = $('#periode_akhir').val()
                var url = "{{ url('/laporan/perangkingan') }}?status=cetak&periode_awal=" + periode_awal + "&periode_akhir=" + periode_akhir;

                window.open(url, '_blank')

            })
        })
    </script>
@endpush
