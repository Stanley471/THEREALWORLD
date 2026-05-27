<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/webp" href="{{ asset('images/logo.webp') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased bg-[#050d19]">
        <div class="min-h-screen flex items-center justify-center px-0 md:px-4 py-10 overflow-hidden bg-auth-hero">
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(248,145,33,0.16),transparent_24%)]"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_right,_rgba(59,130,246,0.10),transparent_26%)]"></div>
            </div>

            <div class="relative w-full max-w-full md:max-w-md mx-auto">
                <div class="auth-panel w-full rounded-none md:rounded-[32px] overflow-hidden">
                    <div class="px-4 py-8 md:px-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
