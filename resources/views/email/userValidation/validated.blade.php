@component('mail::message')

{{ $user_name }}<br>
Welcome to {{ config('app.name') }}



@component('mail::panel')
    Your registration has just been approved by the administrator, click the button below to login to our system
        @component('mail::button', ['url' =>  config('app.url') ])
            Click here to access the system
        @endcomponent
@endcomponent



<br>
{{ config('app.name') }}

    
@endcomponent