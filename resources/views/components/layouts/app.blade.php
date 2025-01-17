<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <!-- content -->
        <main class="drawer-content">
            @include('components.layouts.partials.header')
            {{ $slot }}
        </main>
        <!-- /content -->
        @include('components.layouts.partials.drawer')
        @vite('resources/js/app.js')
    </body>
</html>
