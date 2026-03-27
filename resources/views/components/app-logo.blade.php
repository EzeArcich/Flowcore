@props([
    'sidebar' => false,
])

@if($sidebar)
    <a {{ $attributes->class('inline-flex items-center rounded-2xl px-1 py-2') }}>
        <img
            src="{{ asset('images/logo-fu-bl-ui.png') }}"
            alt="{{ config('app.name', 'FollowUp') }}"
            class="block h-11 w-auto max-w-none object-contain"
        >
        <span class="sr-only">{{ config('app.name', 'FollowUp') }}</span>
    </a>
@else
    <a {{ $attributes->class('inline-flex items-center rounded-2xl px-1 py-1') }}>
        <img
            src="{{ asset('images/logo-fu-bl-ui.png') }}"
            alt="{{ config('app.name', 'FollowUp') }}"
            class="block h-11 w-auto max-w-none object-contain"
        >
        <span class="sr-only">{{ config('app.name', 'FollowUp') }}</span>
    </a>
@endif
