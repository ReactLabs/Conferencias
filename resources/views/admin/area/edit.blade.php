@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <br />
                @if (\Session::has('warning'))
                    <div class="alert alert-warning alert-dismissible fade show text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>{{ \Session::get('warning') }}</strong>
                    </div><br />
                @endif

                <div class="card">
                    <div class="card-header" style="background-color: #4c110f; color: white; opacity: 0.9">{{ __('Edit Area') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('AreaController@update', $id) }}">
                            {{method_field('PATCH')}}
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                                <div class="col-md-6">
                                    <input id="name" name="name" minlength="2"  type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$area->name}}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
@endsection