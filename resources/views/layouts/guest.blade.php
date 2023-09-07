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

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <main class="font-sans text-gray-900 antialiased bg-slate-50">
            <x-main-menu />
            {{ $slot }}
        </main>
        <footer class="bg-slate-100">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
          <div class="sm:flex sm:items-center sm:justify-between">
            <p class="mt-4 text-center text-sm text-gray-500 lg:mt-0 lg:text-right">
              Copyright &copy; {{ date('Y') }}. All rights reserved.
            </p>
          </div>
        </div>
       </footer>
        @livewireScripts
    </body>
</html>
