@props([
    'variant' => 'default', // default, destructive, success, warning, info
    'icon' => null,
])

@php
    $variantClasses = [
        'default' => 'bg-gray-50 text-gray-900 border-gray-200 dark:bg-gray-950 dark:text-gray-50 dark:border-gray-800',
        'destructive' => 'bg-red-50 text-red-900 border-red-200 dark:bg-red-950 dark:text-red-50 dark:border-red-900 [&>svg]:text-red-600 dark:[&>svg]:text-red-400',
        'success' => 'bg-green-50 text-green-900 border-green-200 dark:bg-green-950 dark:text-green-50 dark:border-green-900 [&>svg]:text-green-600 dark:[&>svg]:text-green-400',
        'warning' => 'bg-yellow-50 text-yellow-900 border-yellow-200 dark:bg-yellow-950 dark:text-yellow-50 dark:border-yellow-900 [&>svg]:text-yellow-600 dark:[&>svg]:text-yellow-400',
        'info' => 'bg-blue-50 text-blue-900 border-blue-200 dark:bg-blue-950 dark:text-blue-50 dark:border-blue-900 [&>svg]:text-blue-600 dark:[&>svg]:text-blue-400',
    ];

    $iconMap = [
        'default' => 'information-circle',
        'destructive' => 'exclamation-triangle',
        'success' => 'check-circle',
        'warning' => 'exclamation-circle',
        'info' => 'information-circle',
    ];

    $classes = $variantClasses[$variant] ?? $variantClasses['default'];
    $defaultIcon = $iconMap[$variant] ?? $iconMap['default'];
    $displayIcon = $icon ?? $defaultIcon;
@endphp

<div role="alert" {{ $attributes->merge(['class' => "relative w-full rounded-lg border px-4 py-3 text-sm flex gap-3 {$classes}"]) }}>
    @if($displayIcon)
        <svg class="h-5 w-5 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            @switch($displayIcon)
                @case('information-circle')
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    @break
                @case('exclamation-triangle')
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    @break
                @case('check-circle')
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    @break
                @case('exclamation-circle')
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    @break
                @default
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            @endswitch
        </svg>
    @endif
    <div class="flex-1">
        {{ $slot }}
    </div>
</div>
