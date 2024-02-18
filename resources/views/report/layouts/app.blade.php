<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NHDA</title>

    <!-- Fonts
    -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->

    <!-- CSS Files -->
    <style>
        /* Define a custom font-family name for your Sinhala font */
        @font-face {
            font-family: 'Iskoola_Pota_Regular';
            src: url('/public/fonts/Iskoola_Pota_Regular.ttf') format('ttf');
            /* Update the path to your font file */
            /* You can also include other font formats (e.g., woff, ttf) for better compatibility */
        }

        /* Apply the Sinhala font to specific HTML elements */
        body {
            font-family: 'Iskoola_Pota_Regular', Arial, sans-serif;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
