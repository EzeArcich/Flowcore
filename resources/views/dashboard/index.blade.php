<x-layouts::app title="Dashboard">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Empresas</p>
            <p class="text-2xl font-bold">{{ $stats['total_companies'] }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Prospectos activos</p>
            <p class="text-2xl font-bold">{{ $stats['active_prospects'] }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Follow-ups hoy</p>
            <p class="text-2xl font-bold">{{ $stats['follow_ups_today'] }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4">
            <p class="text-sm text-gray-500">Vencidos</p>
            <p class="text-2xl font-bold">{{ $stats['overdue_follow_ups'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow p-4">
            <h3 class="font-semibold mb-4">Follow-ups de hoy</h3>

            <div class="space-y-3">
                @forelse($todayFollowUps as $followUp)
                    <div class="border rounded p-3">
                        <p class="font-medium">{{ $followUp->company->name }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $followUp->contact?->full_name ?? 'Sin contacto específico' }}
                        </p>
                        <p class="text-sm mt-1">{{ $followUp->reason }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">No hay follow-ups para hoy.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-4">
            <h3 class="font-semibold mb-4">Follow-ups vencidos</h3>

            <div class="space-y-3">
                @forelse($overdueFollowUps as $followUp)
                    <div class="border rounded p-3">
                        <p class="font-medium">{{ $followUp->company->name }}</p>
                        <p class="text-sm text-gray-500">
                            Vencía: {{ $followUp->due_date?->format('d/m/Y') }}
                        </p>
                        <p class="text-sm mt-1">{{ $followUp->reason }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">No hay follow-ups vencidos.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts::app>
