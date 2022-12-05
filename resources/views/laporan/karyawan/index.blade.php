@extends('layout')
@section('laporan-karyawan', 'active')
@section('content')
    <!-- Datatable start -->
    <div class="card-box pd-20 height-25-p mb-30">
        <form action="{{ route('laporan.karyawan.index') }}" method="get">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="karyawan">Karyawan</label>
                        <select class="form-control" required name="karyawan" id="karyawan">
                            <option value="">Pilih Karyawan</option>
                            @forelse ($karyawan as $item)
                                <option value="{{ $item->nip }}" @if (request('karyawan') == $item->nip) selected @endif>
                                    {{ $item->nama_guru }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="periode_awal">Periode Awal</label>
                        <input type="date" value="{{ request('periode_awal') }}" class="form-control" id="periode_awal"
                            required name="periode_awal">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="periode_akhir">Periode Akhir</label>
                        <input type="date" value="{{ request('periode_akhir') }}" class="form-control" id="periode_akhir"
                            required name="periode_akhir">
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
            <h4 class="text-blue h4">Laporan Karyawan</h4>

        </div>
        <div class="pd-20">
            <h5>Presensi : {{$presensi}}</h5>
            <h5>Keterlambatan : {{$terlambat}}</h5>
        </div>
        <div class="pd-20">
            <h5 class="text-dark">Penilaian Kerjasama</h5>
        </div>
        <div class="pb-20">
            <table class="data-table table">
                <thead>
                    <tr>
                        <th class="datatable-nosort">No</th>
                        <th class="datatable-nosort">Komunikasi</th>
                        <th class="datatable-nosort">Penyesuaian Diri</th>
                        <th class="datatable-nosort">Konflik Sesama Karyawan</th>
                        <th class="datatable-nosort">Tanggal</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($kerjasama as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->komunikasi }}</td>
                            <td>{{ $item->penyesuaian_diri }}</td>
                            <td>{{ $item->konflik }}</td>
                            <td>{{ $item->tanggal_penilaian_kerjasama }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pd-20">
            <h5 class="text-dark">Penilaian Sikap Kerja</h5>
        </div>

        <div class="pb-20">
            <table class="data-table table">
                <thead>
                    <tr>
                        <th class="datatable-nosort">No</th>
                        <th class="datatable-nosort">Attitude</th>
                        <th class="datatable-nosort">Minat Kerja</th>
                        <th class="datatable-nosort">Minat Belajar</th>
                        <th class="datatable-nosort">Pressure</th>
                        <th class="datatable-nosort">Inisiatif</th>
                        <th class="datatable-nosort">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sikap_kerja as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->attitude }}</td>
                            <td>{{ $item->minat_kerja }}</td>
                            <td>{{ $item->minat_belajar }}</td>
                            <td>{{ $item->pressure }}</td>
                            <td>{{ $item->inisiatif }}</td>
                            <td>{{ $item->tanggal_penilaian_sikapkerja }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>


        <div class="pd-20">
            <h5 class="text-dark">Pengajuan Ide</h5>
        </div>

        <div class="pb-20">
            <table class="data-table table">
                <thead>
                    <tr>
                        <th class="datatable-nosort">No</th>
                        <th class="datatable-nosort">Tipe Pengajuan</th>
                        <th class="datatable-nosort">Tanggal Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tipe_dokumen }}</td>

                            <td>{{ $item->tanggal_input }}</td>
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
                var karyawan = $('#karyawan').val()
                var periode_awal = $('#periode_awal').val()
                var periode_akhir = $('#periode_akhir').val()
                var url = "{{ url('/laporan/karyawan') }}?status=cetak&periode_awal=" + periode_awal +
                    "&periode_akhir=" + periode_akhir + "&karyawan=" + karyawan;

                window.open(url, '_blank')

            })
        })
    </script>
@endpush
