@php
    $isRegister = ($mode ?? 'login') === 'register';
@endphp

<x-layouts::auth :title="$isRegister ? __('Register') : __('Log in')">
    <livewire:auth.portal-modal :initial-mode="$mode ?? 'login'" />
</x-layouts::auth>
