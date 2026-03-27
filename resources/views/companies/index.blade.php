<x-layouts::app title="Empresas">
    <div class="crm-page space-y-6">
    <div class="crm-card">
        <form method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar..."
                   class="crm-input">

            <select name="status" class="crm-select">
                <option value="">Estado</option>
                @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>
                        {{ $status }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="industry" value="{{ request('industry') }}" placeholder="Industria"
                   class="crm-input">

            <button class="crm-btn-primary">Filtrar</button>
        </form>
    </div>

    <div class="crm-card overflow-hidden p-0">
        <table class="crm-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Industria</th>
                    <th class="text-right">Estado</th>
                    <th>Próx. follow-up</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $company)
                    <tr>
                        <td class="font-medium">{{ $company->name }}</td>
                        <td>{{ $company->industry }}</td>
                        <td class="text-right">
                            <span class="crm-badge crm-badge--company-status" data-status="{{ $company->status }}">
                                {{ $company->status }}
                            </span>
                        </td>
                        <td>
                            {{ $company->next_follow_up_at?->format('d/m/Y') ?? '-' }}
                        </td>
                        <td>
                            <a href="{{ route('companies.show', $company) }}" class="crm-link">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-ink-500 dark:text-ink-400">No hay empresas cargadas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $companies->links() }}
    </div>
    </div>
</x-layouts::app>
