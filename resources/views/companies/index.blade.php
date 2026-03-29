<x-layouts::app title="Empresas">
    <div class="fc-page space-y-6">
    <div class="fc-page-header">
        <p class="fc-kicker">Prospección</p>
        <h1 class="fc-page-title">Empresas</h1>
        <p class="fc-page-subtitle">
            Explorá leads, filtrá por estado comercial y detectá rápido qué cuentas necesitan el próximo movimiento.
        </p>
    </div>

    <div class="fc-card">
        <form method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar..."
                   class="fc-input">

            <select name="status" class="fc-select">
                <option value="">Estado</option>
                @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>
                        {{ $status }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="industry" value="{{ request('industry') }}" placeholder="Industria"
                   class="fc-input">

            <button class="fc-btn fc-btn-primary">Filtrar</button>
        </form>
    </div>

    <div class="fc-card overflow-hidden p-0">
        <table class="fc-table">
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
                            <span class="fc-chip fc-chip--company-status" data-status="{{ $company->status }}">
                                {{ $company->status }}
                            </span>
                        </td>
                        <td>
                            {{ $company->next_follow_up_at?->format('d/m/Y') ?? '-' }}
                        </td>
                        <td>
                            <a href="{{ route('companies.show', $company) }}" class="fc-link">Ver</a>
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
