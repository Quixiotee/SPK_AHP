@extends('layout')
@section('administrasi','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Kompetensi Sosial</h4>
            <p class="mb-30">Tambahkan Data Kompetensi Sosial</p>
        </div>
    </div>
    <form action="/administrasi" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" type="text" name="sosial">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nip">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIlai 1</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="S1">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection