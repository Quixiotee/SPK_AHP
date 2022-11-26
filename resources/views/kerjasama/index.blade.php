@extends('layout')
@section('kerjasama','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">Data Nilai Kerjasama</h4>
		<!-- <a class="btn btn-dark" href="kerjasama/create">Create File </a> -->
	</div>
	<div class="pb-20">
		<table class="data-table table">
			<thead>
				<tr>
					<th>NIP</th>
					<th class="datatable-nosort">Nama Karyawan</th>
					<th class="datatable-nosort">Komunikasi</th>
					<th class="datatable-nosort">Penyesuaian Diri</th>
					<th class="datatable-nosort">konflik dengan rekan kerja</th>
					<!-- <th class="datatable-nosort">Action</th> -->
				</tr>
			</thead>
			<tbody>
				@foreach($tam as $row)
				<tr>
					<td>{{ $row->nip}}</td>
					<td>{{ $row->nama_guru}}</td>
					<td>{{ $row->komunikasi}}</td>
					<td>{{ $row->penyesuaian_diri}}</td>
					<td>{{ $row->konflik}}</td>
					<!-- <td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="/kerjasama/{{$row->id_kerjasama}}/edit"><i class="dw dw-edit2"></i> Edit</a>
								<form action="kerjasama/{{$row->id_kerjasama}}" method="post">
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