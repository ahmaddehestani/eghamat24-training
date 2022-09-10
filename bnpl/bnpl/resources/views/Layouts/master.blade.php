<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  styles  --}}
    <link rel="stylesheet" href="http://localhost/servicesSystem/public/css/styles.css">
    @section('css')
    @show
    <title>@yield('title')</title>
</head>
<body>
@section('content')
@show

{{-- scripts --}}
<script src="http://localhost/servicesSystem/public/js/jquery.js" type="text/javascript"></script>
<script src="http://localhost/servicesSystem/public/js/scripts.js" type="text/javascript"></script>
@section('scripts')
@show
</body>
</html>


