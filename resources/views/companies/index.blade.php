<x-layouts::app title="Empresas">
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar..."
                   class="border rounded px-3 py-2">

            <select name="status" class="border rounded px-3 py-2">
                <option value="">Estado</option>
                @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>
                        {{ $status }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="industry" value="{{ request('industry') }}" placeholder="Industria"
                   class="border rounded px-3 py-2">

            <button class="bg-black text-white rounded px-4 py-2">Filtrar</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-4 py-3">Nombre</th>
                    <th class="text-left px-4 py-3">Industria</th>
                    <th class="text-left px-4 py-3">Estado</th>
                    <th class="text-left px-4 py-3">Próx. follow-up</th>
                    <th class="text-left px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $company)
                    <tr class="border-t">
                        <td class="px-4 py-3 font-medium">{{ $company->name }}</td>
                        <td class="px-4 py-3">{{ $company->industry }}</td>
                        <td class="px-4 py-3">{{ $company->status }}</td>
                        <td class="px-4 py-3">
                            {{ $company->next_follow_up_at?->format('d/m/Y') ?? '-' }}
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('companies.show', $company) }}" class="text-blue-600 hover:underline">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No hay empresas cargadas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $companies->links() }}
    </div>
</x-layouts::app>
