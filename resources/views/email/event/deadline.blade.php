@component('mail::message')


These events are close to deadline <br>


@foreach ($events as $event)
@component('mail::panel')
    {{ $event->name }}<br>
    {{ $event->deadline }}<br>
    @component('mail::button', ['url' =>  config('app.url') . $linkEvent . $event->id])
        Click here for more information
    @endcomponent
@endcomponent
@endforeach





{{ config('app.name') }}

    
@endcomponent