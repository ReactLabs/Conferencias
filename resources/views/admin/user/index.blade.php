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
                    <div class="card-header"> Users </div>
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
                                <th>Email</th>
                                <th>Type</th>
                                <th>Situation</th>
                                <th colspan="2">Operation</th>
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
                                        <td> <a href="{{action('UserController@setActive', $user['id'])}}"class="btn btn-primary"> Activate </a></td>
                                    @else
                                        <td> <a href="{{action('UserController@setActive', $user['id'])}}"class="btn btn-success"> Disable </a></td>
                                    @endif
                                    <td><a href="{{ action('UserController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form id="ex" class="" action="{{action('UserController@destroy', $user->id)}}" method="post">
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
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="{{ asset('js/datatable.js') }}" defer></script>