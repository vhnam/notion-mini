<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name', 'Notion Mini') }} - Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body>
        <div class="bg-background min-h-svh">
            <!-- Header -->
            <header class="border-b border-zinc-200 dark:border-zinc-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="flex items-center gap-2 font-medium">
                                <span class="flex h-8 w-8 items-center justify-center rounded-md">
                                    <x-shared.app-logo-icon class="size-8 fill-current text-black dark:text-white" />
                                </span>
                                <span class="text-lg font-semibold">{{ config('app.name', 'Notion Mini') }}</span>
                            </a>
                        </div>

                        <div class="flex items-center gap-4">
                            <span class="text-sm text-zinc-600 dark:text-zinc-400">
                                Welcome, {{ Auth::user()->name }}!
                            </span>
                            <x-shared.logout-form />
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100">Dashboard</h1>
                    <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                        Welcome to your dashboard! You are successfully logged in.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- User Info Card -->
                    <flux:card>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-4">
                                Account Information
                            </h3>
                            <div class="space-y-2">
                                <div>
                                    <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Name:</span>
                                    <span class="ml-2 text-zinc-900 dark:text-zinc-100">{{ Auth::user()->name }}</span>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Email:</span>
                                    <span class="ml-2 text-zinc-900 dark:text-zinc-100">
                                        {{ Auth::user()->email }}
                                    </span>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">
                                        Member since:
                                    </span>
                                    <span class="ml-2 text-zinc-900 dark:text-zinc-100">
                                        {{ Auth::user()->created_at->format('M j, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </flux:card>

                    <!-- Status Card -->
                    <flux:card>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-4">Account Status</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-sm text-zinc-900 dark:text-zinc-100">Account Active</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                    <span class="text-sm text-zinc-900 dark:text-zinc-100">Logged In</span>
                                </div>
                                @if (Auth::user()->email_verified_at)
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                        <span class="text-sm text-zinc-900 dark:text-zinc-100">Email Verified</span>
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                        <span class="text-sm text-zinc-900 dark:text-zinc-100">Email Not Verified</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </flux:card>
                </div>
            </main>
        </div>

        @fluxScripts
    </body>
</html>
