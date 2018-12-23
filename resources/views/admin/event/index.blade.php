@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<br/>
			@if (\Session::has('success'))
			<div class="alert alert-info alert-dismissible fade show text-center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<strong>{{ \Session::get('success') }}</strong>
			</div>
			<br/>
			@endif
			@if (\Session::has('warning'))
			<div class="alert alert-warning alert-dismissible fade show text-center">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<strong>{{ \Session::get('warning') }}</strong>
			</div>
			<br/>
			@endif
			<div class="card">
				<div class="card-header" style="background-color: #4c110f; color: white; opacity: 0.9"> Events </div>
				<div class="card-body table-responsive">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					<table class="table table-striped text-center">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Initials</th>
								<th>Deadline</th>
								<th colspan="2">Operation</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($events as $event)
								<tr>
									<td>{{ $event->id }}</td>
									<td>{{ $event->name }}</td>
									<td>{{ $event->initials }}</td>
									<td>{{ $event->deadline }}</td>
									<td> <a href="{{action('AdminController@edit', $event['id'])}}"class="btn btn-warning"> Edit </a></td>
									<td> <a href="{{action('AdminController@destroy', $event['id'])}}"class="btn btn-danger"> Remove </a></td>
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