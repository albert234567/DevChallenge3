<!DOCTYPE html>
<html lang="ca">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ asset('js/app.css') }}"> 
    
    <title>DevChallenge3 Fran&Albert</title>
</head>

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

