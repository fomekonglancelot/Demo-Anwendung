<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo-Anwendung</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body class="bg-gray-200">

    @include('layouts.includes.nav')

    <div class="container mx-auto" id="app">

        @yield('content')

    </div>

    @include('layouts.includes.footer')

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>