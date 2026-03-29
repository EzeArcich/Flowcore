<x-layouts::app title="Dashboard">
    <div class="fc-page space-y-6">
        <div class="fc-page-header">
            <p class="fc-kicker">Cockpit comercial</p>
            <h1 class="fc-page-title">Dashboard</h1>
            <p class="fc-page-subtitle">
                Vista diaria para operar el pipeline, resolver seguimientos pendientes y detectar oportunidades que necesitan movimiento.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <div class="fc-stat-card">
            <p class="fc-kicker">Empresas</p>
            <p class="fc-metric-value">{{ $stats['total_companies'] }}</p>
        </div>
        <div class="fc-stat-card">
            <p class="fc-kicker">Prospectos activos</p>
            <p class="fc-metric-value">{{ $stats['active_prospects'] }}</p>
        </div>
        <div class="fc-stat-card">
            <p class="fc-kicker">Follow-ups hoy</p>
            <p class="fc-metric-value">{{ $stats['follow_ups_today'] }}</p>
        </div>
        <div class="fc-stat-card">
            <p class="fc-kicker">Vencidos</p>
            <p class="fc-metric-value">{{ $stats['overdue_follow_ups'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="fc-card">
            <div class="fc-panel-title">
                <h3 class="fc-section-title mb-0">Follow-ups de hoy</h3>
                <span class="fc-chip fc-chip-info">Hoy</span>
            </div>

            <div class="space-y-3">
                @forelse($todayFollowUps as $followUp)
                    <div class="fc-surface-info">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="font-medium">{{ $followUp->company->name }}</p>
                                <p class="text-sm text-ink-500 dark:text-ink-400">
                                    {{ $followUp->contact?->full_name ?? 'Sin contacto específico' }}
                                </p>
                                <p class="mt-1 text-sm">{{ $followUp->reason }}</p>
                            </div>

                            <a href="{{ route('follow-ups.edit', $followUp) }}" class="fc-btn fc-btn-secondary fc-btn-sm fc-btn-action shrink-0">
                                Ver
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-ink-500 dark:text-ink-400">No hay follow-ups para hoy.</p>
                @endforelse
            </div>
        </div>

        <div class="fc-card">
            <div class="fc-panel-title">
                <h3 class="fc-section-title mb-0">Follow-ups vencidos</h3>
                <span class="fc-chip fc-chip-urgent">Urgente</span>
            </div>

            <div class="space-y-3">
                @forelse($overdueFollowUps as $followUp)
                    <div class="fc-surface-danger">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="font-medium">{{ $followUp->company->name }}</p>
                                <p class="text-sm text-ink-500 dark:text-ink-400">
                                    Vencía: {{ $followUp->due_date?->format('d/m/Y') }}
                                </p>
                                <p class="mt-1 text-sm">{{ $followUp->reason }}</p>
                            </div>

                            <a href="{{ route('follow-ups.edit', $followUp) }}" class="fc-btn fc-btn-secondary fc-btn-sm fc-btn-action shrink-0">
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
