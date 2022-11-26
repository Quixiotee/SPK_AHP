@extends('layout')
@section('kelas','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tambahkan Data Kriteria</h4>
            <br>
        </div>
    </div>
    <form action="/kelas" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Kriteria</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nama">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Atribut</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="atribut">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Bobot Kriteria</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="bobot">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
<br>
</div>
<!-- Default Basic Forms End -->
@endsection