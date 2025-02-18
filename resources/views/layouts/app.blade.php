<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>


                </header>
            @endisset
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-3">
                <div class="">
                        @if (session('status'))
            <div class="text-center text-green-500 font-semibold">
                {{ session('status') }}
            </div>
                        @endif

                            @if($errors->any())
                                @foreach ($errors->all() as $error)

                                    <div class="text-center text-red-500 font-semibold">
                                        {{ $error }}
                                    </div>

                                @endforeach
                            @endif
            <!-- Page Content -->
                </div>
            </div>
            <main>

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
