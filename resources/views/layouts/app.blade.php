<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Defult Title')</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="stylesheet"  href="{{url('css/style.css') }}">
    @livewireStyles
</head>
<body>
    {{$slot}}
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/all.min.js')}}"></script>
    <script src="{{url('js/jQuery v3.5.1.js')}}"></script>
    @livewireScripts
</body>
</html>