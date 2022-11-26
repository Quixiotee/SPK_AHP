@extends('layout')
@section('instruktur','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Instruktur</h4>
            <p class="mb-30">Edit Data Instruktur</p>
        </div>
    </div>
    <form action="/sikapkerja/{{$sikapkerja -> id_kerja}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nip" value="{{$sikapkerja->nip}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai Attitude</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k1" value="{{$sikapkerja->attitude}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIlai Minat kerja</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k2" value="{{$sikapkerja->minat_kerja}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIlai Minat Belajar</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k3" value="{{$sikapkerja->minat_belajar}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kemampuan Dibawah Tekanan</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k4" value="{{$sikapkerja->pressure}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Inisiatif</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k5" value="{{$sikapkerja->inisiatif}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
</div>
<!-- Default Basic Forms End -->
@endsection