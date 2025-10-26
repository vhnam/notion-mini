<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name', 'Notion Mini') . ' | Dashboard' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body>
        <body class="min-h-screen bg-white dark:bg-zinc-800">
            @if (Auth::user()->hasRole('Super Admin'))
                <x-modules.layouts.system-sidebar />
                <x-modules.layouts.system-header />
            @else
                <x-modules.layouts.home-sidebar />
                <x-modules.layouts.home-header />
            @endif
            <flux:main>
                {{ $slot }}
            </flux:main>
            @fluxScripts
        </body>

        @fluxScripts
    </body>
</html>
