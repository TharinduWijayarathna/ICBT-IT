<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="description" content="NHDA Admin">
    <title>@yield('title', 'Admin Dashboard | NHDA Admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('libraries.styles')
    @php
        $curr_url = Route::currentRouteName();
    @endphp

    <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
    <link href="{{ asset('img/logo/logo.png') }}" rel="apple-touch-icon">
</head>

<body class="bg-default">
    <div class="main-content" style="min-height: 90vh">
        @yield('header')
        @yield('content')
    </div>
    @include('components.footer')
    @include('libraries.scripts')
</body>

</html>
