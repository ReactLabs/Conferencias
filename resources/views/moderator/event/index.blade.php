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

					<div class="card">
		
						<div class="card-body">

							<label class="col-md-12 col-form-label text-md-center">{{ __('Advanced Search') }}</label><br>

							<form method="GET" action="{{ action('EventController@eventsFilter') }}">
								@csrf

								<div class="form-group row">
									<label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>
		
									<div class="col-md-6">
										<select id="area" class="form-control selectpicker" data-live-search="true" name="area">
											<option value="0">Choose the area...</option>
											<option data-divider="true"></option>
											@foreach($areas as  $area)
												<option value="{{ $area->id }}">{{ $area->name }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date from') }}</label>
		
									<div class="col-md-6">

										<input id="date_from" type="date" class="form-control" name="date_from" value="{{  old('date_from') }}">

									</div>
								</div>

								<div class="form-group row">
									<label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date to') }}</label>
		
									<div class="col-md-6">

										<input id="date_to" type="date" class="form-control" name="date_to" value="{{  old('date_to') }}">
									
									</div>
								</div>
		
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __('Search') }}
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<br><br>

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



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('js/datatable.js') }}"></script>


@endsection