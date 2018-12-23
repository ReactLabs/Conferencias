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
                    <div class="card-header" style="background-color: #4c110f; color: white; opacity: 0.9">{{ __('Area - Information') }}</div>

                    <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <label class="col-form-label text-md-right">{{ $area->name }}</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection