@extends('layout')
@section('user','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Data User</h4>
            <p class="mb-30">Tambahkan User Baru </p>
        </div>
    </div>
    <form action="/user" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id User</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="id_user">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="username">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id Pegawai</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="id_pegawai">
                    @foreach($pegawai as $row)
                    <option value="{{$row->id_pegawai}}">{{$row->id_pegawai}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Role</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="role">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
</div>
<!-- Default Basic Forms End -->
@endsection