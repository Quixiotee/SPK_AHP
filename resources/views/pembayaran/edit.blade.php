@extends('layout')
@section('pembayaran','active')
@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Pembayaran Administrasi</h4>
            <p class="mb-30">Tambahkan Pembayaran Administrasi Peserta </p>
        </div>
    </div>
    <form action="/pembayaran" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input class="form-control" type="text" name="id_peserta" id="id_peserta" value="{{$pembayaran -> id_peserta }}" hidden>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Peserta</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="nama_peserta" id="nama_peserta" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kode Diklat</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="kode_diklat" id="kode_diklat" value="{{$pembayaran -> kode_diklat}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jumlah Pembayaran</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" value="{{$pembayaran -> jumlah_pembayaran}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Sisa Pembayaran</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="sisa_pembayaran" id="sisa_pembayaran" value="{{$pembayaran -> sisa_pembayaran}}" readonly>
            </div>
        </div>
        <input class="form-control" type="number" name="harga" id="harga" hidden="hidden">
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<!-- Default Basic Forms End -->
@endsection
@push('script')
<script>
    let id = $("#id_peserta").val();
    $.ajax({

        url: '/pembayaran/getDiklat/' + id,
        method: 'GET',
        success: function(data) {
            $("#kode_diklat").val(data[0]);
            $("#harga").val(data[1]);
            $("#nama_peserta").val(data[2]);
        }
    });
    $(document).ready(function() {

        $('#jumlah_pembayaran').on('keyup', function() {

            let bayar = $(this).val();
            let harga = $("#harga").val();

            let sisa = bayar - harga;
            $("#sisa_pembayaran").val(sisa);
        });
    });
</script>
@endpush