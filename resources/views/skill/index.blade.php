@extends('layout')
@section('improve','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Pengajuan Ide / Skill Improve</h4>
        <!-- <a class="btn btn-dark" href="skill/create">Create File </a> -->
    </div>
    <div class="pb-20">
        <table class="data-table table"> 
            <thead>
                <tr>
                    <th>NIP</th>
                    <th class="datatable-nosort">Tipe Dokumen</th>
                    <th class="datatable-nosort">Tanggal Pengajuan</th>
                    <th class="datatable-nosort">Bukti</th>
                    <th class="datatable-nosort">Keterangan</th>
                    <!-- <th class="datatable-nosort">Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($skill as $row)
                <tr>
                    <td>{{ $row->nip}}</td>
                    <td>{{ $row->tipe_dokumen}}</td>
                    <td>{{ $row->tanggal_input}}</td>
                    <td><img width="150px" src="{{ url('/Bukti_ide/'.$row->bukti) }}"></td>
                    <td>{{ $row->keterangan }}</td>
                    <!-- <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="/skill/{{$row->id_skill}}/edit"><i class="dw dw-edit2"></i> Edit</a>
                                <form action="skill/{{$row->id_skill}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="dropdown-item"><i class="dw dw-delete-3"></i>Delete</button>
                                </form>
                            </div>
                        </div>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Datatable End -->
@endsection