@extends('layout')
@section('absensi','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Absensi</h4>
        <!-- <a class="btn btn-dark" href="jadwal/create">Create File </a> -->
    </div>
    <div class="pb-20">
        <table class="data-table table"> 
            <thead>
                <tr>
                    <th class="datatable-nosort">NIP</th>
                    <th class="datatable-nosort">Nama Karyawan</th>
                    <th>Shift</th>
                    <th>Tanggal Absen</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th class="datatable-nosort">Status</th>
                    <!-- <th class="datatable-nosort">Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($absen as $row)
                <tr>
                    <td>{{ $row->nip}}</td>
                    <td>{{ $row->nama_guru }}</td>
                    <td>{{ $row->shift }}</td>
                    <td>{{ $row->tanggal_absen}}</td>
                    <td>{{ $row->jam_masuk }}</td>
                    <td>{{ $row->jam_keluar }}</td>
                    <td>{{ $row->status}}</td>
                    <!-- <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<form action="jadwal/{{$row->id_absen}}" method="post">
									@csrf
									@method('delete')
									<button class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</button>
								</form>
                            </div>
                        </div>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Datatable End -->
@endsection