<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') . ' - Login' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-base-200">
    {{ $slot }}

    @vite('resources/js/app.js')
</body>

</html>
