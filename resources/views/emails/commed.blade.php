
@component('mail::message')
# RMB Ticket System

Welcom in RMB Ticket System

@component('mail::panel')
 يرجي فحص النظام يوجد لديك جهاز جديد

@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
