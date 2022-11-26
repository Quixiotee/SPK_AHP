@extends('layout')
@section('kelas','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Kelas</h4>
            <p class="mb-30">Tambahkan Data Kelas </p>
        </div>
    </div>
    <form action="/kelas/{{$detail_kelas -> id_kelas}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kode Diklat</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="kode_diklat">
                    @foreach($diklat as $row)
                    <option value="{{$row->kode_diklat}}" @if($row->kode_diklat == $detail_kelas->nama_diklat) selected @endif>{{$row->kode_diklat}} - {{$row->nama_diklat}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Kelas</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nama_kelas" value="{{$detail_kelas -> nama_kelas}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id Peserta</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="id_peserta">
                    @foreach($peserta as $row)
                    <option value="{{$row->id_peserta}}" @if($row->id_peserta == $detail_kelas->id_peserta) selected @endif>{{$row->id_peserta}} - {{$row->nama_peserta}}</option>
                    @endforeach
                </select>
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection