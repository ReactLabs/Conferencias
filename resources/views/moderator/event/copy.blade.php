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
                <div class="card-header " style="background-color: #4c110f; color: white; opacity: 0.9">{{ __('Register Event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('EventController@store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $event->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="initials" class="col-md-4 col-form-label text-md-right">{{ __('Initials') }}</label>

                            <div class="col-md-6">
                                <input id="initials" type="text" class="form-control" name="initials" value="{{ $event->initials }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{ $event->date }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" required autofocus>{{ $event->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualis" class="col-md-4 col-form-label text-md-right">{{ __('Qualis') }}</label>

                            <div class="col-md-6">
                                <input id="qualis" type="text" class="form-control" name="qualis" value="{{ $event->qualis }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="url" class="form-control" name="link" value="{{ $event->link }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                            <div class="col-md-6">
                                <input id="deadline" type="date" class="form-control" name="deadline" value="{{ $event->deadline }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="areas" class="col-md-4 col-form-label text-md-right">{{ __('Areas') }}</label>

                            <div class="col-md-6">
                                <select id="areas" class="form-control selectpicker" multiple data-live-search="true" title="Choose the areas..." name="area[]" required>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                    <option data-divider="true"></option>
                               
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <select id="tags" class="form-control selectpicker" multiple data-live-search="true" title="Choose the tags..." name="tag[]" required>
                                    @foreach ($event->tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
                                    @endforeach
                                </select>
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


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>-->

<script>

    $(document).ready( function() {

        var areas = {!! json_encode($event->areas->toArray()) !!};
        var areasSelected = []
        areas.forEach(area => {
            areasSelected.push(area.id)
        });
        $('#areas').selectpicker('val', areasSelected);

        $('#areas').on('loaded.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.post({
                url: "{{ url('/moderator/get-tags/')}}",
                method: 'post',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    areas : $(this).val(),
                },
                success: function(result){
                    console.log(result);
                    $('#tags').empty();
                    $.each(result, function (index,value) {
                        $('#tags').append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                    $('#tags').selectpicker("refresh");

                    var tags = {!! json_encode($event->tags->toArray()) !!};
                    var tagsSelected = []
                    tags.forEach(tag => {
                        tagsSelected.push(tag.id)
                    });
                    $('#tags').selectpicker('val', tagsSelected);
                }
            });
        });
    })

    $(document).ready(function() {
        $('#areas').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.post({
                url: "{{ url('/moderator/get-tags/')}}",
                method: 'post',
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {
                    areas : $(this).val(),
                },
                success: function(result){
                    console.log(result);
                    $('#tags').empty();
                    $.each(result, function (index,value) {
                        $('#tags').append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                    $('#tags').selectpicker("refresh");
                }
            });
        });
    });




</script>
@endsection
