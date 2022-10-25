
@component('mail::message')
# RMB Ticket System

Welcom in RMB Ticket System

@component('mail::panel')
 يرجي فحص النظام يوجد لديك تذاكر بنتظار الرد عليها

رقم التذكرة : {{$tiket_no}}

أسم المرسل :{{$author_name}}

البريد الاكتروني :{{$author_email}}

@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
