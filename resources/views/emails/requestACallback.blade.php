@component('mail::message')
# Hello,

### Someone is requesting a callback:

@component('mail::panel')
    First Name: {{ $info['first_name'] }}<br>
    Last Name: {{ $info['last_name'] }}<br>
    Email: {{ $info['email'] }}<br>
    Phone: {{ $info['phone'] }}<br>
    Comment: {{ $info['comment'] }}<br>
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
