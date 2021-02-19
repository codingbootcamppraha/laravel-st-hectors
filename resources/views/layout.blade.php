<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>St. Hector's Veterinary Clinic</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div class="page-content">

        @include('common/header')

        @yield('content')

    </div>
    
</body>
</html>