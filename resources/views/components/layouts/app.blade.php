<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Tech Corner' }}</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="bg-slate-100 dark:bg-slate-700">
        {{ $slot }}
    </body>
</html>
