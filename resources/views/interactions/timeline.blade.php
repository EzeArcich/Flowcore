<x-layouts::app :title="'Timeline · ' . $company->name">
    <div class="crm-page space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Timeline de interacciones</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400">
                    Empresa: <span class="font-medium">{{ $company->name }}</span>
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('companies.show', $company) }}" class="crm-btn-secondary">Volver a la empresa</a>
                <a href="{{ route('companies.interactions.create', $company) }}" class="crm-btn-primary">Nueva interacción</a>
            </div>
        </div>

        <div class="crm-card p-6">
            <div class="space-y-4">
                @forelse($interactions as $interaction)
                    <div class="flex gap-4">
                        <div class="mt-1 h-full w-px bg-gradient-to-b from-brand-400/60 via-ink-300/40 to-transparent"></div>

                        <div class="flex-1 space-y-1">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="crm-badge text-[10px] uppercase tracking-[0.12em]">
                                        {{ $interaction->direction }} · {{ $interaction->channel }}
                                    </span>
                                    @if($interaction->contact)
                                        <span class="text-xs text-ink-500 dark:text-ink-400">
                                            {{ $interaction->contact->full_name }}
                                        </span>
                                    @endif
                                </div>

                                <div class="text-xs text-ink-500 dark:text-ink-400">
                                    {{ $interaction->interacted_at?->format('d/m/Y H:i') }}
                                </div>
                            </div>

                            @if($interaction->subject)
                                <p class="text-sm font-medium text-ink-900 dark:text-ink-50">
                                    {{ $interaction->subject }}
                                </p>
                            @endif

                            @if($interaction->message)
                                <p class="text-xs text-ink-700 dark:text-ink-200 whitespace-pre-line">
                                    {{ $interaction->message }}
                                </p>
                            @endif

                            @if($interaction->response)
                                <p class="mt-1 text-xs text-emerald-700 dark:text-emerald-300 whitespace-pre-line">
                                    {{ $interaction->response }}
                                </p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-ink-500 dark:text-ink-400">No hay interacciones registradas aún.</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $interactions->links() }}
            </div>
        </div>
    </div>
</x-layouts::app>

