@extends('layout')
@section('karyawan','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Karyawan</h4>
        <!-- <a class="btn btn-dark" href="data_pegawai/create">Create File </a> -->
    </div>
    <div class="pb-20">
        <table class="data-table table"> 
            <thead>
                <tr>
                    <th>NIK</th>
                    <th class="datatable-nosort">Nama Lengkap</th>
                    <th class="datatable-nosort">Tanggal Lahir</th>
                    <th class="datatable-nosort">Tempat Lahir</th>
                    <th class="datatable-nosort">Alamat</th>
                    <th class="datatable-nosort">Jenis Kelamin</th>
                    <th class="datatable-nosort">Jabatan</th>
                    <th class="datatable-nosort">Shift</th>
                    <th class="datatable-nosort">Nomor Telepon</th>
                    <!-- <th class="datatable-nosort">Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($guru as $row)
                <tr>
                    <td>{{ $row->nip}}</td>
                    <td>{{ $row->nama_guru}}</td>
                    <td>{{ $row->tgl_lahir}}</td>
                    <td>{{ $row->tempat_lahir}}</td>
                    <td>{{ $row->alamat}}</td>
                    <td>{{ $row->jenis_kelamin}}</td>
                    <td>{{ $row->jabatan}}</td>
                    <td>{{ $row->shift}}</td>
                    <td>{{ $row->nomor_tlp}}</td>
                    <!-- <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="/data_pegawai/{{$row->nip}}/edit"><i class="dw dw-edit2"></i> Edit</a>
                                <form action="data_pegawai/{{$row->nip}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="dropdown-item"><i class="dw dw-delete-3"></i>Delete</button>
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