@extends('layout')
@section('peserta','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Form Input Pengajuan Ide / Improve</h4>
            <p class="mb-30">Tambahkan Data </p>
        </div>
    </div>
    <form action="/skill" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
            <div class="col-sm-12 col-md-10">
                <!-- <input class="form-control" type="text" name="nip"> -->
                <select class="form-control" name="nip" id="nip">
                    @foreach($guru as $row)
                    <option value="{{$row->nip}}">{{$row->nama_guru}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tipe Dokumen</label>
            <div class="col-sm-12 col-md-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input " type="checkbox" id="inlineCheckbox1" value="OPL" name="tipe_dokumen">
                    <label class="form-check-label" for="inlineCheckbox1">OPL</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="SS" name="tipe_dokumen">
                    <label class="form-check-label" for="inlineCheckbox2">SS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Kaizen" name="tipe_dokumen">
                    <label class="form-check-label" for="inlineCheckbox3">Kaizen</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Pengajuan</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" name="tanggal_input">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Bukti</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="file" name="bukti">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="keterangan">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
</div>
<!-- Default Basic Forms End -->
@endsection