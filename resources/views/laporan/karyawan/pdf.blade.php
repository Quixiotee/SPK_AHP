<!DOCTYPE html>
<html>

<head>
    <title>Laporan Perangkingan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

    <center>
        <h4>Laporan Perangkingan</h4>
        @if (is_array($periode_awal))
            <h5>Semua Periode</h5>
        @else
            <h5> {{ $periode_awal }} - {{ $periode_akhir }}</h5>
        @endif

    </center>
    <h6>Nama Karyawan : {{$karyawan->nama_guru}}</h6>
    <h6>NIP : {{$karyawan->nip}}</h6>
    <h6>Jabatan : {{$karyawan->jabatan}}</h6>
    <h6>Presensi : {{$presensi}}</h6>
    <h6>Keterlambatan : {{$terlambat}}</h6>
    <h5>Penilaian Kerjasama</h5>
    <table class="table table-bordered" width="100%" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Komunikasi</th>
                <th>Penyesuaian Diri</th>
                <th>Konflik Sesama Karyawan</th>
                <th>Tanggal</th>
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


    <h5>Penilaian Sikap Kerja</h5>
    <table class="table table-bordered" width="100%" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Attitude</th>
                <th>Minat Kerja</th>
                <th>Minat Belajar</th>
                <th>Pressure</th>
                <th>Inisiatif</th>
                <th>Tanggal</th>
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


    <h5>Pengajuan Ide</h5>
    <table class="table table-bordered" width="100%" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Pengajuan</th>
                <th>Tanggal Pengajuan</th>
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


</body>

</html>
