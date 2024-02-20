<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">

        <meta name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

        <!-- SEO meta tags -->
        <title>ICBT IT Society</title>

        @include('public.libraries.styles')

        <!-- Page loading styles -->
    </head>
</head>

<body>

    <main class="page-wrapper">
        @include('public.components.header')

        @yield('content')

    </main>

    @include('public.components.footer')

    @include('public.libraries.scripts')
</body>

</html>
