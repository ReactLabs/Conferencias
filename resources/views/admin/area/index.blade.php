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
                    <div class="card-header">Areas</div>
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
                                <th colspan="2">Operation</th>
                            </tr>
                            <tr>
                                <!-- Colunas para colocar os botões na mesma coluna-->
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($areas as $area)
                                <tr>
                                    <td>{{ $area->id }}</td>
                                    <td><a href="{{action('AreaController@show', $area->id)}}">{{ $area->name }}</a></td>
                                    <td> <a href="{{action('AreaController@edit', $area->id)}}"class="btn btn-warning"> Edit </a></td>
                                    <td>
                                        <form id="ex" class="" action="{{action('AreaController@destroy', $area->id)}}" method="post">
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Remove</button>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script src="{{ asset('js/datatable.js') }}" defer></script>



@endsection