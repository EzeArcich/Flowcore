<x-layouts::app.sidebar :title="$title ?? null">
    <flux:main>
        <x-crm.flash-alerts />
        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>
