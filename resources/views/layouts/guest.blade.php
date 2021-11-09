<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <style>
            .StripeElement * {
                color: white!important;
            }

            .article:last-child {
                border-bottom: none!important;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
            @livewire('cart-controller')
            <main class="min-h-screen flex flex-col justify-between">
                {{ $slot }}
            </main>
    </body>
    @livewireScripts
    @yield('javascript')
</html>
