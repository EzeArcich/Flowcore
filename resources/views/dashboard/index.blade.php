<x-layouts::app title="Dashboard">
    <div class="crm-page space-y-6">
        <div class="crm-page-header">
            <p class="crm-page-eyebrow">Cockpit comercial</p>
            <h1 class="crm-page-title">Dashboard</h1>
            <p class="crm-page-subtitle">
                Vista diaria para operar el pipeline, resolver seguimientos pendientes y detectar oportunidades que necesitan movimiento.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <div class="crm-stat-card">
            <p class="crm-kpi-label">Empresas</p>
            <p class="crm-kpi-value">{{ $stats['total_companies'] }}</p>
        </div>
        <div class="crm-stat-card">
            <p class="crm-kpi-label">Prospectos activos</p>
            <p class="crm-kpi-value">{{ $stats['active_prospects'] }}</p>
        </div>
        <div class="crm-stat-card">
            <p class="crm-kpi-label">Follow-ups hoy</p>
            <p class="crm-kpi-value">{{ $stats['follow_ups_today'] }}</p>
        </div>
        <div class="crm-stat-card">
            <p class="crm-kpi-label">Vencidos</p>
            <p class="crm-kpi-value">{{ $stats['overdue_follow_ups'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="crm-card">
            <div class="crm-panel-title">
                <h3 class="crm-section-title mb-0">Follow-ups de hoy</h3>
                <span class="crm-panel-chip">Hoy</span>
            </div>

            <div class="space-y-3">
                @forelse($todayFollowUps as $followUp)
                    <div class="crm-surface-info">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="font-medium">{{ $followUp->company->name }}</p>
                                <p class="text-sm text-ink-500 dark:text-ink-400">
                                    {{ $followUp->contact?->full_name ?? 'Sin contacto específico' }}
                                </p>
                                <p class="mt-1 text-sm">{{ $followUp->reason }}</p>
                            </div>

                            <a href="{{ route('follow-ups.edit', $followUp) }}" class="crm-btn-secondary crm-btn-sm crm-btn-action shrink-0">
                                Ver
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-ink-500 dark:text-ink-400">No hay follow-ups para hoy.</p>
                @endforelse
            </div>
        </div>

        <div class="crm-card">
            <div class="crm-panel-title">
                <h3 class="crm-section-title mb-0">Follow-ups vencidos</h3>
                <span class="crm-panel-chip !border-rose-200 !bg-rose-50 !text-rose-700 dark:!border-rose-800 dark:!bg-rose-950/50 dark:!text-rose-200">Urgente</span>
            </div>

            <div class="space-y-3">
                @forelse($overdueFollowUps as $followUp)
                    <div class="crm-surface-danger">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="font-medium">{{ $followUp->company->name }}</p>
                                <p class="text-sm text-ink-500 dark:text-ink-400">
                                    Vencía: {{ $followUp->due_date?->format('d/m/Y') }}
                                </p>
                                <p class="mt-1 text-sm">{{ $followUp->reason }}</p>
                            </div>

                            <a href="{{ route('follow-ups.edit', $followUp) }}" class="crm-btn-secondary crm-btn-sm crm-btn-action shrink-0">
                                Ver
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-ink-500 dark:text-ink-400">No hay follow-ups vencidos.</p>
                @endforelse
            </div>
        </div>
    </div>
    </div>
</x-layouts::app>
