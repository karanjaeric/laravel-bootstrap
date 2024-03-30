<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$pageTitle??'Laravel-Bootstrap'}}</title>
</head>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<body>
<x-partials.navbar/>
    <div class="container">
        {{$slot??''}}

    </div>
    
</body>
</html>