@extends('layout')
@section('jadwal','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Jadwal Peserta</h4>
            <p class="mb-30">Edit Jadwal Peserta </p>
        </div>
    </div>
    <form action="/jadwal/{{$jadwal->id_jadwal}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id Kelas</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="id_kelas">
                    @foreach($kelas as $row) 
                    <option value="{{$row->id_kelas}}" @if($row->id_kelas == $jadwal->id_kelas) selected @endif>{{$row->id_kelas}} - {{$row->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Id Instruktur</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="exampleFormControlSelect1" name="id_instruktur">
                    @foreach($instruktur as $row)
                    <option value="{{$row->id_instruktur}}" @if($row->id_instruktur == $jadwal->id_instruktur) selected @endif>{{$row->id_instruktur}} - {{$row->Nama}} </option>
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