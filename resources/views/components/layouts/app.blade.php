<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn.icon-icons.com/icons2/2551/PNG/512/cube_transparent_icon_152876.png" type="image/x-icon">
    <title>{{ $title ?? 'Tech Corner' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-slate-100 dark:bg-slate-700">
    @livewire('partials.navbar')
    {{ $slot }}
    @livewire('partials.footer')

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>