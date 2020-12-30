<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('frontend/images/moi_logo.png') }}" sizes="130x130">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="EAVcNo7Toid4t2Lb05a5dL3FdzR3K6FUEIGNdddN">

    <title>
        Matching Service Program
    </title>
</head>
<body>
   <div class="se-pre-con"></div>
    @include('frontend.layouts.header')
    
         @yield('content')
   
    @include('frontend.layouts.footer')
    @include('frontend.layouts.javascript')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @include('sweetalert::alert')
    
    
    
</body>
</html>
