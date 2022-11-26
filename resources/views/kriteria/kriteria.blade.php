@extends('layout')
@section('kriteria','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Kriteria</h4>
        <a class="btn btn-dark" href="kriteria/create">Tambah Kriteria </a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
            Delete Kriteria
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Pilih Kriteria yang ingin di hapus !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Detail Kriteria</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kriteria as $data)
                                <tr>
                                    <td>{{$data->nama_kriteria}}</td>
                                    <td>
                                        <form action="kelas/{{$data->kode_kriteria}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item"><i class="dw dw-delete-3"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <table class="data-table table">
            <thead>
                <tr>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriteria as $row)
                <tr>
                    <td>{{ $row->kode_kriteria}}</td>
                    <td>{{ $row->nama_kriteria}}</td>
                    <td>{{ $row->bobot}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Datatable End -->
@endsection