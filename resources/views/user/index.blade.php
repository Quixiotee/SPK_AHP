@extends('layout')
@section('user','active')
@section('content')
<!-- Datatable start -->
<div class="card-box mb-30">
	<div class="pd-20">
		<h4 class="text-blue h4">User</h4>
        <a class="btn btn-dark" href="user/create">Create User </a>
	</div>
	<div class="pb-20">
		<table class="data-table-export table">
			<thead>
				<tr>
					<th>Id User</th>
					<th class="datatable-nosort">Username</th>
					<th class="datatable-nosort">Password</th>
					<th class="datatable-nosort">Id Pegawai</th>
					<th class="datatable-nosort">Role</th>
					<th class="datatable-nosort">Activity Log</th>
					<th class="datatable-nosort">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user as $row)
				<tr>
					<td>{{ $row->id_user}}</td>
					<td>{{ $row->username}}</td>
					<td>{{ $row->password}}</td>
					<td>{{ $row->id_pegawai}}</td>
					<td>{{ $row->role}}</td>
					<td>{{ $row->update_by}}</td>
					<td>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="/user/{{$row->id_user}}/edit"><i class="dw dw-edit2"></i> Edit</a>
								<form action="user/{{$row->id_user}}" method="post">
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