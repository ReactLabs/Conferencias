@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br />
            @if (\Session::has('success'))
                <div class="alert alert-info alert-dismissible fade show text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong>{{ \Session::get('success') }}</strong>
                </div><br />
            @endif
            @if (\Session::has('warning'))
                <div class="alert alert-warning alert-dismissible fade show text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong>{{ \Session::get('warning') }}</strong>
                </div><br />
            @endif

            <div class="card">
                <div class="card-header">{{ __('Register Event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('EventController@store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{  old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="initials" class="col-md-4 col-form-label text-md-right">{{ __('Initials') }}</label>

                            <div class="col-md-6">
                                <input id="initials" type="text" class="form-control" name="initials" value="{{  old('initials') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{  old('date') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" required autofocus>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualis" class="col-md-4 col-form-label text-md-right">{{ __('Qualis') }}</label>

                            <div class="col-md-6">
                                <input id="qualis" type="text" class="form-control" name="qualis" value="{{  old('qualis') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="url" class="form-control" name="link" value="{{  old('link') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                            <div class="col-md-6">
                                <input id="deadline" type="date" class="form-control" name="deadline" value="{{  old('deadline') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
