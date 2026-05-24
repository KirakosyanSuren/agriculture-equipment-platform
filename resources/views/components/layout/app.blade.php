@props([
    'title' => 'AgroMach'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @stack('styles')
</head>
<body>
    <x-layout.header />

    <main id="main-content">
        {{ $slot }}
    </main>

    <x-ui.alert />

    <x-layout.footer />

    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/filter-form.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    @stack('scripts')

</body>
</html>
