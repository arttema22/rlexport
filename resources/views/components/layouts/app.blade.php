<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
    <main class="max-w-7xl mx-auto  px-4 sm:px-6 lg:px-8">
        {{-- Navigation menu --}}
        @livewire('navigation-menu')

        <!-- Page Content -->
        <div class="mt-8">
            {{ $slot }}
        </div>
    </main>
</body>

</html>