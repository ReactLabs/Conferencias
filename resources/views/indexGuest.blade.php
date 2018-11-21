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
				<div class="card-header">Events</div>
				<div class="card-body table-responsive">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					<table id="filtroTabelaGuest" class="table table-striped text-center">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Initials</th>
								<th>Deadline</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($events as $event)
								<tr>
									<td>{{ $event->id }}</td>
									<td><a href="{{action('GuestController@show', $event->id)}}">{{ $event->name }}</td>
									<td>{{ $event->initials }}</td>
									<td>{{ $event->deadline }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('js/datatable.js') }}"></script>


@endsection