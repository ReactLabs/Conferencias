@component('mail::message')

Dear {{ $user_name }}



@component('mail::panel')
    We're sorry, but your user has just been disabled.<br>
    Because of this, you can no longer login to the system.<br> 
    Please contact the system administrator for more information.
@endcomponent


<br>
{{ config('app.name') }}

    
@endcomponent