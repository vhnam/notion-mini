{{--
    Alert Component Examples - Shadcn Inspired
    ==========================================

    This file demonstrates various usage patterns for the Alert component system.
    DO NOT include this file in production - it's for reference only.
--}}

<div class="max-w-4xl mx-auto p-8 space-y-8">
    <div>
        <h1 class="text-3xl font-bold mb-2">Alert Component Examples</h1>
        <p class="text-gray-600 dark:text-gray-400">Shadcn-inspired alert components for Laravel Blade</p>
    </div>

    {{-- Default Alert --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Default</h2>
        <x-ui.alert>
            <x-ui.alert-title>Heads up!</x-ui.alert-title>
            <x-ui.alert-description>
                You can add components to your app using the cli.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Destructive Alert --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Destructive</h2>
        <x-ui.alert variant="destructive">
            <x-ui.alert-title>Error</x-ui.alert-title>
            <x-ui.alert-description>
                Your session has expired. Please log in again.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Success Alert --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Success</h2>
        <x-ui.alert variant="success">
            <x-ui.alert-title>Success!</x-ui.alert-title>
            <x-ui.alert-description>
                Your changes have been saved successfully.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Warning Alert --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Warning</h2>
        <x-ui.alert variant="warning">
            <x-ui.alert-title>Warning</x-ui.alert-title>
            <x-ui.alert-description>
                This action will affect all users in your organization.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Info Alert --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Info</h2>
        <x-ui.alert variant="info">
            <x-ui.alert-title>Did you know?</x-ui.alert-title>
            <x-ui.alert-description>
                You can customize your dashboard from the settings page.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Alert without title --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Without Title</h2>
        <x-ui.alert variant="info">
            <x-ui.alert-description>
                This is an alert without a title. Just a simple message.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Alert with only title --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Title Only</h2>
        <x-ui.alert variant="success">
            <x-ui.alert-title>Payment received!</x-ui.alert-title>
        </x-ui.alert>
    </section>

    {{-- Alert with custom icon (no icon) --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Without Icon</h2>
        <x-ui.alert variant="default" :icon="false">
            <x-ui.alert-title>Simple Alert</x-ui.alert-title>
            <x-ui.alert-description>
                This alert doesn't have an icon.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Alert with complex content --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Complex Content</h2>
        <x-ui.alert variant="warning">
            <x-ui.alert-title>Important Update Required</x-ui.alert-title>
            <x-ui.alert-description>
                <p class="mb-2">Your application requires an update to continue functioning properly:</p>
                <ul class="list-disc list-inside space-y-1 ml-1">
                    <li>Security patches have been applied</li>
                    <li>New features are available</li>
                    <li>Performance improvements included</li>
                </ul>
                <p class="mt-2">Please update at your earliest convenience.</p>
            </x-ui.alert-description>
        </x-ui.alert>
    </section>

    {{-- Alert with custom classes --}}
    <section>
        <h2 class="text-xl font-semibold mb-4">Custom Styling</h2>
        <x-ui.alert variant="default" class="border-2 shadow-lg">
            <x-ui.alert-title class="text-lg">Enhanced Alert</x-ui.alert-title>
            <x-ui.alert-description>
                You can add custom classes to any component part.
            </x-ui.alert-description>
        </x-ui.alert>
    </section>
</div>

{{--
    USAGE IN YOUR BLADE TEMPLATES:
    ================================

    Basic Usage:
    ------------
    <x-ui.alert>
        <x-ui.alert-title>Title here</x-ui.alert-title>
        <x-ui.alert-description>Description here</x-ui.alert-description>
    </x-ui.alert>

    With Variant:
    -------------
    <x-ui.alert variant="destructive">
        <x-ui.alert-title>Error occurred</x-ui.alert-title>
        <x-ui.alert-description>Something went wrong</x-ui.alert-description>
    </x-ui.alert>

    Available Variants:
    -------------------
    - default (gray)
    - destructive (red)
    - success (green)
    - warning (yellow)
    - info (blue)

    Without Icon:
    -------------
    <x-ui.alert :icon="false">
        <x-ui.alert-title>No Icon Alert</x-ui.alert-title>
    </x-ui.alert>

    With Laravel Session Status:
    ----------------------------
    @if (session('success'))
        <x-ui.alert variant="success">
            <x-ui.alert-title>Success!</x-ui.alert-title>
            <x-ui.alert-description>{{ session('success') }}</x-ui.alert-description>
        </x-ui.alert>
    @endif

    @if (session('error'))
        <x-ui.alert variant="destructive">
            <x-ui.alert-title>Error</x-ui.alert-title>
            <x-ui.alert-description>{{ session('error') }}</x-ui.alert-description>
        </x-ui.alert>
    @endif

    With Validation Errors:
    -----------------------
    @if ($errors->any())
        <x-ui.alert variant="destructive">
            <x-ui.alert-title>There were {{ $errors->count() }} error(s) with your submission</x-ui.alert-title>
            <x-ui.alert-description>
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-ui.alert-description>
        </x-ui.alert>
    @endif
--}}
