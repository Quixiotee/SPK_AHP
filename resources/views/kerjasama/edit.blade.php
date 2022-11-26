@extends('layout')
@section('pegawai','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Nilai Kerjasama</h4>
            <p class="mb-30">Edit Data Kerjasama</p>
        </div>
    </div>
    <form action="/kerjasama/{{$kerjasama -> id_kerjasama}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="nip" value="{{$kerjasama->nip}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Komunikasi</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="komunikasi" value="{{$kerjasama->komunikasi}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Penyesuaian Diri</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="penyesuainan_diri" value="{{$kerjasama->penyesuaian_diri}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Konflik Dengan Rekan Kerja</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type=text name="konflik" value="{{$kerjasama->konflik}}">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection