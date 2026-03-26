<x-layouts::app :title="$company->name">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-xl font-bold">{{ $company->name }}</h3>
                        <p class="text-gray-500">{{ $company->industry }} · {{ $company->country }}</p>
                        <p class="mt-2 text-sm">Estado: <strong>{{ $company->status }}</strong></p>
                    </div>

                    <a href="{{ route('companies.edit', $company) }}" class="text-blue-600 hover:underline">
                        Editar
                    </a>
                </div>

                @if($company->notes)
                    <div class="mt-4">
                        <h4 class="font-medium mb-2">Notas</h4>
                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $company->notes }}</p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold">Contactos</h4>
                    <a href="{{ route('companies.contacts.create', $company) }}" class="text-blue-600 hover:underline">
                        Nuevo contacto
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($company->contacts as $contact)
                        <div class="border rounded p-3">
                            <p class="font-medium">{{ $contact->full_name }}</p>
                            <p class="text-sm text-gray-500">{{ $contact->role }}</p>
                            <p class="text-sm">{{ $contact->email }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay contactos aún.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold">Interacciones</h4>
                    <a href="{{ route('companies.interactions.create', $company) }}" class="text-blue-600 hover:underline">
                        Nueva interacción
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($company->interactions as $interaction)
                        <div class="border rounded p-3">
                            <p class="font-medium">{{ $interaction->channel }} · {{ $interaction->direction }}</p>
                            <p class="text-sm text-gray-500">{{ $interaction->interacted_at?->format('d/m/Y H:i') }}</p>
                            <p class="text-sm mt-2 whitespace-pre-line">{{ $interaction->message }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay interacciones aún.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h4 class="font-semibold mb-4">Follow-ups</h4>

                <div class="space-y-3">
                    @forelse($company->followUps as $followUp)
                        <div class="border rounded p-3">
                            <p class="font-medium">{{ $followUp->reason }}</p>
                            <p class="text-sm text-gray-500">
                                {{ $followUp->due_date?->format('d/m/Y') }} · {{ $followUp->status }}
                            </p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay follow-ups.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold">Cotizaciones</h4>
                    <a href="{{ route('companies.quotations.create', $company) }}" class="text-blue-600 hover:underline">
                        Nueva cotización
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($company->quotations as $quotation)
                        <div class="border rounded p-3">
                            <p class="font-medium">{{ $quotation->title }}</p>
                            <p class="text-sm text-gray-500">
                                {{ $quotation->amount }} {{ $quotation->currency }} · {{ $quotation->status }}
                            </p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay cotizaciones.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
