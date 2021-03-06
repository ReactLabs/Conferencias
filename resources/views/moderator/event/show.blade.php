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
                <div class="card-header" style="background-color: #4c110f; color: white; opacity: 0.9">{{ __($event->name.' - Information') }}

                    <div class="float-md-right">
                        <a href="{{ url("moderator/event/copy/" . $event->id) }}">
                            <img height="24" width="24" src="{{ asset("img/copy.png") }}">
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label text-md-right">{{ $event->name }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="initials" class="col-md-4 col-form-label text-md-right">{{ __('Initials') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label text-md-right">{{ $event->initials }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label text-md-right">{{ $event->date }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label">{{ $event->description }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="qualis" class="col-md-4 col-form-label text-md-right">{{ __('Qualis') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label text-md-right">{{ $event->qualis }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                        <div class="col-md-6">
                            <a href="{{ $event->link }}" class="form-control-plaintext">{{ $event->link }}</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label text-md-right">{{ $event->deadline }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="areas" class="col-md-4 col-form-label text-md-right">{{ __('Areas') }}</label>

                        <div class="col-md-6">
                            <ul>
                                @foreach ($event->areas as $area)
                                    <li>{{ $area->name }}</li>   
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                        <div class="col-md-6">
                            <ul>
                                @foreach ($event->tags as $tag)
                                    <li>{{ $tag->name }}</li>   
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Created by') }}</label>

                        <div class="col-md-6">
                            <label class="col-form-label text-md-right">{{ $event->getUserName() }}</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
