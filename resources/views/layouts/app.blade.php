<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/tabs.css')}}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="mt-4">
                {{ $slot }}
            </main>
        </div>
        <script src="{{asset('/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.js')}}"></script>
        <script src="{{asset('/js/autocomplete.js')}}"></script>
        <script src="{{asset('/js/location.js')}}"></script>
        <script src="{{asset('/js/build.js')}}"></script>
        <script src="{{asset('/js/app.js')}}"></script>
        <script src="{{asset('/js/tabs.js')}}"></script>
        @stack('scripts')
    </body>
</html>
