<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Appetizer Event System - Mendoza</title>
    
    <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
    <link rel="icon" href="{{asset('images/smiling-face.png')}}">
</head>
<body>

    <div class="wrapper">
        @include('partials.header')

        <div class="container-fluid">
            @yield('content')
        </div>

    </div>

    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>