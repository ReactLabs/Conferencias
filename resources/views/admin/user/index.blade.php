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
                    <div class="card-header" style="background-color: #4c110f; color: white; opacity: 0.9"> Users </div>
                    <div class="card-body table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="filtroTabela" class="text-center table-striped" style="width: 100%;">
                            <thead>
                            <tr>
                                <th rowspan="2">ID</th>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Email</th>
                                <th rowspan="2">Type</th>
                                <th rowspan="2">Situation</th>
                                <th colspan="2">Operation</th>
                            </tr>
                            <tr>
                                <!-- Colunas para colocar os botões na mesma coluna-->
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{ $user['type'] }}</td>
                                    @if( ! $user['active'])
                                        <td>
                                            <a href="{{action('UserController@setActive', $user['id'])}}"class="btn btn-primary btn-sm">
                                                <img width="20px" height="20px" src="{{ asset('img/disabled.png') }}">
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{action('UserController@setActive', $user['id'])}}"class="btn btn-success btn-sm">
                                                <img width="20px" height="20px" src="{{ asset('img/accept.png') }}">
                                            </a>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ action('UserController@edit', $user['id'])}}" class="btn btn-warning btn-sm" style="background-color: gold;border-color: gold">
                                            <img width="20px" height="20px" src="{{ asset('img/edit.png') }}">
                                        </a>
                                    </td>
                                    <td>
                                        <form id="ex" class="" action="{{action('UserController@destroy', $user->id)}}" method="post">
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <img width="20px" height="20px" src="{{ asset('img/delete.png') }}">
                                            </button>
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

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('js/datatable.js') }}"></script>

@endsection
