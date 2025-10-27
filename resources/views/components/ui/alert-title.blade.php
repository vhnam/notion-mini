@props([
    'as' => 'h5',
])

@php
    $tag = $as;
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => 'mb-1 font-medium leading-none tracking-tight']) }}>
    {{ $slot }}
</{{ $tag }}>
