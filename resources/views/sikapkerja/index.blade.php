@extends('layout')
@section('sikap','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">Data Sikap Kerja Karyawan</h4>
		<!-- <a class="btn btn-dark" href="sikapkerja/create">Create File </a> -->
	</div>
	<div class="pb-20">
		<table class="data-table table">
			<thead>
				<tr>
					<th>NIP</th>
					<th>Nama Karyawan</th>
					<th class="datatable-nosort">attitude</th>
					<th class="datatable-nosort">Minat Kerja</th>
					<th class="datatable-nosort">Minar Belajar</th>
					<th class="datatable-nosort">Kemampuan kerja dibawah tekanan</th>
					<th class="datatable-nosort">Inisiatif</th>
					<!-- <th class="datatable-nosort">Action</th> -->
				</tr>
			</thead>
			<tbody>
				@foreach($sikapkerja as $row)
				<tr>
					<td>{{ $row->nip}}</td>
					<td>{{ $row->nama_guru }}</td>
					<td>{{ $row->attitude}}</td>
					<td>{{ $row->minat_kerja}}</td>
					<td>{{ $row->minat_belajar}}</td>
					<td>{{ $row->pressure}}</td>
					<td>{{ $row->inisiatif}}</td>
					<!-- <td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="/sikapkerja/{{$row->id_kerja}}/edit"><i class="dw dw-edit2"></i> Edit</a>
								<form action="sikapkerja/{{$row->id_kerja}}" method="post">
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