<title>@yield("title")</title>


<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
<link rel="stylesheet" type="text/css" href="{{URL :: asset('assets/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL :: asset('assets/css/rtl.css')}}" />

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> --}}

@yield('css')
 