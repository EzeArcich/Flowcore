<x-layouts::app title="Follow-ups">
    <div class="crm-page space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Follow-ups</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400">
                    Control centralizado de tareas de seguimiento.
                </p>
            </div>

            <a href="{{ route('follow-ups.create') }}" class="crm-btn-spotlight">Nuevo follow-up</a>
        </div>

        <div class="crm-card p-6 space-y-4">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <select name="status" class="crm-select">
                    <option value="">Estado</option>
                    @foreach(['pending','done','skipped','cancelled'] as $status)
                        <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
                    @endforeach
                </select>

                <select name="due" class="crm-select">
                    <option value="">Vencimiento</option>
                    <option value="today" @selected(request('due') === 'today')>Hoy</option>
                    <option value="overdue" @selected(request('due') === 'overdue')>Vencidos</option>
                </select>

                <div class="md:col-span-2 flex items-center justify-end">
                    <button class="crm-btn-primary">Filtrar</button>
                </div>
            </form>
        </div>

        <div class="crm-card p-0 overflow-hidden">
            <table class="crm-table">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Vence</th>
                        <th>Estado</th>
                        <th>Motivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($followUps as $followUp)
                        <tr>
                            <td class="font-medium">
                                {{ $followUp->company?->name ?? '—' }}
                            </td>
                            <td>
                                {{ $followUp->contact?->full_name ?? '—' }}
                            </td>
                            <td>
                                {{ $followUp->due_date?->format('d/m/Y') ?? '—' }}
                            </td>
                            <td>
                                <span class="crm-badge"
                                      data-status="{{ $followUp->status }}">
                                    {{ $followUp->status }}
                                </span>
                            </td>
                            <td>
                                {{ $followUp->reason }}
                            </td>
                            <td>
                                <div class="flex flex-wrap items-center gap-2">
                                    <a href="{{ route('follow-ups.edit', $followUp) }}" class="crm-btn-secondary crm-btn-sm crm-btn-action crm-btn-editorial">Editar</a>

                                    @if($followUp->status === 'pending')
                                        <x-crm.confirm-action
                                            :action="route('follow-ups.complete', $followUp)"
                                            method="PATCH"
                                            title="Completar follow-up"
                                            message="Se marcará este seguimiento como completado."
                                            trigger-label="Completar"
                                            confirm-label="Sí, completar"
                                            trigger-class="crm-btn-success crm-btn-sm crm-btn-action crm-btn-editorial"
                                            confirm-class="crm-btn-success crm-btn-editorial"
                                        />

                                        <x-crm.confirm-action
                                            :action="route('follow-ups.skip', $followUp)"
                                            method="PATCH"
                                            title="Omitir follow-up"
                                            message="Se omitirá esta tarea de seguimiento."
                                            trigger-label="Omitir"
                                            confirm-label="Sí, omitir"
                                            trigger-class="crm-btn-warning crm-btn-sm crm-btn-action crm-btn-editorial"
                                            confirm-class="crm-btn-warning crm-btn-editorial"
                                        />
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-ink-500 dark:text-ink-400">
                                No hay follow-ups registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $followUps->links() }}
        </div>
    </div>
</x-layouts::app>
