@props([
    'sidebar' => false,
    'variant' => null,
    'imgClass' => null,
])

@php
    $resolvedVariant = $variant ?? ($sidebar ? 'icon' : 'light');

    $logoPath = match ($resolvedVariant) {
        'brand' => 'images/flowcore_brnd.png',
        'dark' => 'images/flowcore_dk.jpg',
        'mono' => 'images/flowcore_mncrm.png',
        'icon' => 'images/flowcore_fvc.png',
        default => 'images/flowcore_lg.png',
    };

    $defaultImageClasses = $resolvedVariant === 'icon'
        ? 'block size-11 rounded-2xl object-cover'
        : 'block h-11 w-auto max-w-none object-contain';

    $imageClasses = trim($defaultImageClasses.' '.($imgClass ?? ''));
@endphp

<a {{ $attributes->class($sidebar ? 'inline-flex items-center rounded-2xl px-1 py-2' : 'inline-flex items-center rounded-2xl px-1 py-1') }}>
    <img
        src="{{ asset($logoPath) }}"
        alt="{{ config('app.name', 'Flowcore') }}"
        class="{{ $imageClasses }}"
    >
    <span class="sr-only">{{ config('app.name', 'Flowcore') }}</span>
</a>
