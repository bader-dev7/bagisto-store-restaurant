{{-- File: packages/Webkul/CustomTheme/src/Resources/views/components/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    {{-- Load theme assets manually --}}
    @bagistoVite([
        'src/Resources/assets/css/app.css',
        'src/Resources/assets/js/app.js'
    ])

    {{-- Additional meta tags --}}
    @stack('meta')

    {{-- Additional styles --}}
    @stack('styles')
</head>
<body class="{{ $bodyClass ?? '' }}">

    {{-- Header component --}}
    <x-custom-theme::layouts.header />

    {{-- Main content --}}
    <main class="main-content">
        {{ $slot }}
    </main>

    {{-- Footer component --}}
    <x-custom-theme::layouts.footer />

    {{-- Additional scripts --}}
    @stack('scripts')
</body>
</html>
