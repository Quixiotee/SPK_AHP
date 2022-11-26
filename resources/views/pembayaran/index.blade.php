@extends('layout')
@section('pembayaran','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">Data Kompetensi Profesional</h4>
		<a class="btn btn-dark" href="pembayaran/create">Create File</a>
	</div>
	<div class="pb-20">
		<table class="data-table table">
			<thead>
				<tr>
					<th>NIP</th>
					<th class="datatable-nosort">Nama Guru</th>
					<th class="datatable-nosort">Nilai 1</th>
					<th class="datatable-nosort">Nilai 2</th>
					<th class="datatable-nosort">Nilai 3</th>
					<th class="datatable-nosort">Nilai 4</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($profesional as $row)
				<tr>
					<td>{{ $row->nip}}</td>
					<td>{{ $row->nama_guru}}</td>
					<td>{{ $row->P1}}</td>
					<td>{{ $row->P2}}</td>
					<td>{{ $row->P3}}</td>
					<td>{{ $row->P4}}</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<form action="pembayaran/{{$row->id_profesional}}" method="post">
									@csrf
									@method('delete')
									<button class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</button>
								</form>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<!-- Datatable End -->
@endsection