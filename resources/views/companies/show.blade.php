<x-layouts::app :title="$company->name">
    <div class="crm-page space-y-6">
        <div class="crm-page-header">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <p class="crm-page-eyebrow">Empresa</p>
                        <div class="flex flex-wrap items-center gap-3">
                            <h1 class="crm-page-title !mt-0 !text-[2.6rem]">{{ $company->name }}</h1>
                            <span class="crm-badge crm-badge--company-status" data-status="{{ $company->status }}">
                                {{ $company->status }}
                            </span>
                        </div>
                        <p class="crm-page-subtitle !mt-0">
                            {{ $company->industry ?: 'Industria no definida' }}
                            @if($company->country || $company->city)
                                · {{ collect([$company->city, $company->country])->filter()->implode(', ') }}
                            @endif
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                        <div class="crm-surface-muted">
                            <p class="crm-kpi-label">Contactos</p>
                            <p class="text-2xl font-bold text-ink-900 dark:text-white">{{ $company->contacts->count() }}</p>
                        </div>

                        <div class="crm-surface-muted">
                            <p class="crm-kpi-label">Interacciones</p>
                            <p class="text-2xl font-bold text-ink-900 dark:text-white">{{ $company->interactions->count() }}</p>
                        </div>

                        <div class="crm-surface-muted">
                            <p class="crm-kpi-label">Cotizaciones</p>
                            <p class="text-2xl font-bold text-ink-900 dark:text-white">{{ $company->quotations->count() }}</p>
                        </div>

                        <div class="crm-surface-muted">
                            <p class="crm-kpi-label">Follow-ups</p>
                            <p class="text-2xl font-bold text-ink-900 dark:text-white">{{ $company->followUps->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3 lg:justify-end">
                    <a href="{{ route('companies.edit', $company) }}" class="crm-btn-spotlight">
                        Editar empresa
                    </a>
                    <a href="{{ route('companies.index') }}" class="crm-btn-spotlight">
                        Volver al listado
                    </a>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="crm-form-section space-y-2">
                    <p class="crm-kpi-label">Sitio web</p>
                    @if($company->website)
                        <a href="{{ $company->website }}" target="_blank" rel="noreferrer" class="crm-link break-all">{{ $company->website }}</a>
                    @else
                        <p class="text-sm text-ink-500 dark:text-ink-400">No definido</p>
                    @endif
                </div>

                <div class="crm-form-section space-y-2">
                    <p class="crm-kpi-label">Tamaño estimado</p>
                    @if($company->company_size_min || $company->company_size_max)
                        <p class="text-sm font-semibold text-ink-800 dark:text-ink-100">
                            {{ $company->company_size_min ?? '—' }} - {{ $company->company_size_max ?? '—' }} personas
                        </p>
                    @else
                        <p class="text-sm text-ink-500 dark:text-ink-400">Sin estimación</p>
                    @endif
                </div>

                <div class="crm-form-section space-y-2">
                    <p class="crm-kpi-label">Timing comercial</p>
                    <p class="text-sm text-ink-700 dark:text-ink-200">
                        Primer contacto: {{ $company->first_contact_at?->format('d/m/Y') ?? '—' }}
                    </p>
                    <p class="text-sm text-ink-700 dark:text-ink-200">
                        Último contacto: {{ $company->last_contact_at?->format('d/m/Y') ?? '—' }}
                    </p>
                </div>

                <div class="crm-form-section space-y-2">
                    <p class="crm-kpi-label">Visibilidad</p>
                    <div class="flex flex-wrap gap-2">
                        @if($company->is_priority)
                            <span class="crm-panel-chip">Prioritaria</span>
                        @endif

                        <span class="crm-panel-chip {{ $company->is_active ? '' : '!border-zinc-300 !bg-zinc-100 !text-zinc-700 dark:!border-zinc-700 dark:!bg-zinc-900/50 dark:!text-zinc-300' }}">
                            {{ $company->is_active ? 'Activa' : 'Inactiva' }}
                        </span>
                    </div>

                    <p class="text-sm text-ink-700 dark:text-ink-200">
                        Próximo follow-up: {{ $company->next_follow_up_at?->format('d/m/Y') ?? '—' }}
                    </p>
                </div>
            </div>

            @if($company->notes)
                    <div class="crm-form-section mt-6 space-y-3">
                        <div>
                            <p class="crm-kpi-label">Contexto</p>
                            <h2 class="crm-block-title">Notas comerciales</h2>
                        </div>

                    <p class="whitespace-pre-line text-sm leading-6 text-ink-700 dark:text-ink-200">{{ $company->notes }}</p>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-[1.55fr_1fr]">
            <div class="space-y-6">
                <section class="crm-form-shell">
                    <div class="crm-panel-title">
                        <div>
                            <p class="crm-kpi-label">Personas</p>
                            <h2 class="crm-block-title">Contactos</h2>
                        </div>
                        <a href="{{ route('companies.contacts.create', $company) }}" class="crm-btn-secondary crm-btn-sm">
                            Nuevo contacto
                        </a>
                    </div>

                    <div class="space-y-3">
                        @forelse($company->contacts as $contact)
                            <div class="crm-form-section">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div class="space-y-1">
                                        <p class="font-bold text-ink-900 dark:text-ink-50">{{ $contact->full_name }}</p>
                                        <p class="text-sm text-ink-500 dark:text-ink-400">{{ $contact->role ?: 'Rol sin definir' }}</p>
                                        <p class="text-sm text-ink-700 dark:text-ink-200">{{ $contact->email ?: 'Sin email cargado' }}</p>
                                    </div>

                                    <div class="flex flex-wrap gap-2">
                                        @if($contact->is_primary)
                                            <span class="crm-panel-chip">Principal</span>
                                        @endif
                                        @if($contact->is_decision_maker)
                                            <span class="crm-panel-chip">Decision maker</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-ink-500 dark:text-ink-400">No hay contactos aún.</p>
                        @endforelse
                    </div>
                </section>

                <section class="crm-form-shell">
                    <div class="crm-panel-title">
                        <div>
                            <p class="crm-kpi-label">Actividad</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Interacciones recientes</h2>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('companies.timeline', $company) }}" class="crm-btn-secondary crm-btn-sm">
                                Ver timeline
                            </a>
                            <a href="{{ route('companies.interactions.create', $company) }}" class="crm-btn-secondary crm-btn-sm">
                                Nueva interacción
                            </a>
                        </div>
                    </div>

                    <div class="space-y-3">
                        @forelse($company->interactions as $interaction)
                            <div class="crm-form-section">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div class="space-y-1">
                                        <p class="font-bold text-ink-900 capitalize dark:text-ink-50">
                                            {{ str_replace('_', ' ', $interaction->channel) }} · {{ $interaction->direction }}
                                        </p>
                                        <p class="text-sm text-ink-500 dark:text-ink-400">
                                            {{ $interaction->interacted_at?->format('d/m/Y H:i') ?? 'Sin fecha' }}
                                        </p>
                                    </div>

                                    @if($interaction->outcome)
                                        <span class="crm-panel-chip">{{ $interaction->outcome }}</span>
                                    @endif
                                </div>

                                @if($interaction->message)
                                    <p class="mt-3 whitespace-pre-line text-sm leading-6 text-ink-700 dark:text-ink-200">{{ $interaction->message }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-sm text-ink-500 dark:text-ink-400">No hay interacciones aún.</p>
                        @endforelse
                    </div>
                </section>
            </div>

            <div class="space-y-6">
                <section class="crm-form-shell">
                    <div class="crm-panel-title">
                        <div>
                            <p class="crm-kpi-label">Seguimiento</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Follow-ups</h2>
                        </div>
                        <a href="{{ route('follow-ups.create') }}" class="crm-btn-secondary crm-btn-sm">
                            Nuevo follow-up
                        </a>
                    </div>

                    <div class="space-y-3">
                        @forelse($company->followUps as $followUp)
                            <div class="{{ $followUp->status === 'pending' ? 'crm-surface-info' : 'crm-form-section' }}">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="space-y-1">
                                        <p class="font-bold text-ink-900 dark:text-ink-50">{{ $followUp->reason }}</p>
                                        <p class="text-sm text-ink-500 dark:text-ink-400">
                                            {{ $followUp->due_date?->format('d/m/Y') ?? 'Sin fecha' }}
                                        </p>
                                    </div>

                                    <span class="crm-panel-chip">{{ $followUp->status }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-ink-500 dark:text-ink-400">No hay follow-ups.</p>
                        @endforelse
                    </div>
                </section>

                <section class="crm-form-shell">
                    <div class="crm-panel-title">
                        <div>
                            <p class="crm-kpi-label">Propuestas</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Cotizaciones</h2>
                        </div>
                        <a href="{{ route('companies.quotations.create', $company) }}" class="crm-btn-secondary crm-btn-sm">
                            Nueva cotización
                        </a>
                    </div>

                    <div class="space-y-3">
                        @forelse($company->quotations as $quotation)
                            <div class="crm-form-section">
                                <div class="space-y-1">
                                    <p class="font-bold text-ink-900 dark:text-ink-50">{{ $quotation->title }}</p>
                                    <p class="text-sm text-ink-500 dark:text-ink-400">
                                        {{ number_format((float) $quotation->amount, 2, ',', '.') }} {{ $quotation->currency }} · {{ $quotation->status }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-ink-500 dark:text-ink-400">No hay cotizaciones.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-layouts::app>
