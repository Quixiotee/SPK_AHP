<!DOCTYPE html>
<html>

<head>
    <title>Laporan Perhitungan</title>
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
        <h4>Laporan Perhitungan</h4>
        @if (is_array($periode_awal))
            <h5>Semua Periode</h5>
        @else
            <h5> {{ $periode_awal }} - {{ $periode_akhir }}</h5>
        @endif

    </center>

    <table class="table table-bordered" width="100%" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Hasil</th>
                <th>Periode</th>
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


</body>

</html>
