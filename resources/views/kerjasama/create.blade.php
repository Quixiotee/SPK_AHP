@extends('layout')
@section('kerjasama','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Form Nilaikerjasama</h4>
            <p class="mb-30">Tambahkan Data NIlai kerjasama</p>
        </div>
    </div>
    <form action="/kerjasama" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <!-- <input class="form-control" type="number" name="nip"> -->
                <select class="form-control" name="nip" id="nip">
                    @foreach($guru as $row)
                    <option value="{{$row->nip}}">{{$row->nama_guru}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Komunikasi</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="komunikasi">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Penyesuaian Diri</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="penyesuainan_diri">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Konflik</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type=text name="konflik">
            </div>
        </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection