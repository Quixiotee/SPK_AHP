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
    <form action="/instruktur/{{$kepribadian -> id_kepribadian}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nip" value="{{$kepribadian->nip}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai 1</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k1" value="{{$kepribadian->K1}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIlai 2</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="k2" value="{{$kepribadian->K2}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
</div>
<!-- Default Basic Forms End -->
@endsection