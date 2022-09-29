
@component('mail::message')
# RMB Ticket System

Welcom in RMB Ticket System .
@component('mail::panel')
To Login to your RMB Ticket system click on the below button
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login/user'])
Control Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
