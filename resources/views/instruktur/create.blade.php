@extends('layout')
@section('instruktur','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Kompetensi Kepribadian</h4>
            <p class="mb-30">Tambahkan Data Kompetensi Kepribadian</p>
        </div>
    </div>
    <form action="/instruktur" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" type="number" name="id_kepribadian">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nip">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai 1</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k1">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIlai 2</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k2">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
</div>
<!-- Default Basic Forms End -->
@endsection