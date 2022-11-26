@extends('layout')
@section('pegawai','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data Nilai Pedagogik</h4>
            <p class="mb-30">Edit Data Pedagogik</p>
        </div>
    </div>
    <form action="/pegawai/{{$pedagogik -> id_pedagogik}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="nip" value="{{$pedagogik->nip}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai 1</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="n1" value="{{$pedagogik->N1}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai 2</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="n2" value="{{$pedagogik->N2}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai 3</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type=text name="n3" value="{{$pedagogik->N3}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nilai 4</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control date-picker" type="text" name="n4" value="{{$pedagogik->N4}}">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection