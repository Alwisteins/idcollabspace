<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'IDCollabSpace' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap');

        * {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
</head>

<body class="bg-stone-50 dark:bg-gray-900">
    <x-sidebar />

    <div class="sm:ml-64 min-h-screen">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
