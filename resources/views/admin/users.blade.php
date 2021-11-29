@extends('layouts.admin')

@section('content')
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
				<div class="card-body">
					<p class="card-title mb-0">Users</p>
					<div class="table-responsive">
						<table class="table table-striped table-borderless">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
								@foreach($users as $key => $row)
									<tr>
										<td>{{$key + 1}}</td>
										<td>{{$row->firstname . ' ' . $row->lastname}}</td>
										<td>{{$row->email}}</td>
										<td>{{$row->status}}</td>
										<td>
											<a href="#" class="btn btn-sm btn-danger">Suspend</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection