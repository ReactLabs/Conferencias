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
					<table id="filtroTabela" class="table table-striped text-center">
						<thead>
							<tr>
								<th rowspan="2">ID</th>
								<th rowspan="2">Name</th>
								<th rowspan="2">Initials</th>
								<th rowspan="2">Deadline</th>
								<th colspan="2">Operation</th>
							</tr>
							<tr>
								<!-- Colunas para colocar os botões na mesma coluna-->
								<th></th> 
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($events as $event)
								<tr>
									<td>{{ $event->id }}</td>
									<td><a href="{{action('EventController@show', $event->id)}}">{{ $event->name }}</td>
									<td>{{ $event->initials }}</td>
									<td>{{ $event->deadline }}</td>
									<td> <a href="{{action('EventController@edit', $event->id)}}"class="btn btn-warning"> Edit </a></td>
									<td>
										<form action="{{ action('EventController@destroy', $event->id) }}" method="post">
											@csrf
											<input name="_method" type="hidden" value="DELETE">
											<button class="btn btn-danger" type="submit">Delete</button>
										</form>
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

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="{{ asset('js/datatable.js') }}" defer></script>


@endsection