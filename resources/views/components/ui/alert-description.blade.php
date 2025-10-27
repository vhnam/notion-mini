@props([])

<div {{ $attributes->merge(['class' => 'text-sm leading-relaxed [&_p]:leading-relaxed opacity-90']) }}>
    {{ $slot }}
</div>
