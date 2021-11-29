@extends('layouts.admin')

@section('content')
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="card">
				<div class="card-body">
					<p class="card-title mb-0">Tickets</p>
					<div class="table-responsive">
						<table class="table table-striped table-borderless">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Employees</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
								@foreach($organizations as $key => $row)
									<tr>
										<td>{{$key + 1}}</td>
										<td>{{$row->name}}</td>
										<td>{{$row->employees}}</td>
										<td>{{ ($row->status == 1) ? 'Active' : 'Inactive' }}</td>
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