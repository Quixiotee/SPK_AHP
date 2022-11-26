@extends('layout')
@section('jadwal','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Absensi</h4>
            <p class="mb-30">Tambahkan Tanggal Absensi Guru </p>
        </div>
    </div>
    <form action="/jadwal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" type="text" name="absen">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <!-- <input class="form-control" type="text" name="nip"> -->
                <select class="form-control" name="nip" id="nip">
                    @foreach($guru as $row)
                    <option value="{{$row->nip}}">{{$row->nama_guru}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Absen</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" name="tgl_absen">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam Masuk</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="time" name="jam_masuk">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam Keluar</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="time" name="jam_keluar">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Status</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="status">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<br>
<!-- Default Basic Forms End -->
@endsection