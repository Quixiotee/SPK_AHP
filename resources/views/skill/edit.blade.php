@extends('layout')
@section('peserta','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Karyawan</h4>
            <p class="mb-30">Edit Data Karyawan</p>
        </div>
    </div>
    <form action="/data_pegawai/{{$guru -> nip}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nip" value="{{$guru -> nip}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nama" value="{{$guru -> nama_guru}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type=date name="tanggal_lahir" value="{{$guru -> tgl_lahir}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tempat lahir</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="tempat_lahir" value="{{$guru -> tempat_lahir}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jenis kelamin</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="jk" value="{{$guru -> jenis_kelamin}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jabatan</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="jabatan" value="{{$guru -> jabatan}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Shift</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="shift" value="{{$guru -> shift}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="tlp" value="{{$guru -> nomor_tlp}}">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection