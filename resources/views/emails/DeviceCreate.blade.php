
@component('mail::message')
# RMB Ticket System

Welcom in RMB Ticket System

@component('mail::panel')
 يرجي فحص النظام يوجد لديك تذاكر بنتظار الرد عليها

نوع الجهاز : {{$deviceTypes}}

الرقم التسلسلي للجهاز :{{$sn}}

أسم الجهاز :{{$title}}

@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
