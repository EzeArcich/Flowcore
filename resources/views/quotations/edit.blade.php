<x-layouts::app :title="'Editar cotización · ' . $quotation->company->name">
    <div class="fc-page">
        <div class="fc-card max-w-3xl p-6 space-y-6">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Editar cotización</h1>
                    <p class="text-sm text-ink-500 dark:text-ink-400">
                        Empresa: <span class="font-medium">{{ $quotation->company->name }}</span>
                    </p>
                </div>
                <a href="{{ route('companies.show', $quotation->company) }}" class="fc-link">Volver a la empresa</a>
            </header>

            <form method="POST" action="{{ route('quotations.update', $quotation) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium mb-1">Título</label>
                    <input type="text" name="title" value="{{ old('title', $quotation->title) }}" class="fc-input" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Contacto</label>
                        <select name="contact_id" class="fc-select">
                            <option value="">Sin contacto específico</option>
                            @foreach($quotation->company->contacts as $contact)
                                <option value="{{ $contact->id }}" @selected(old('contact_id', $quotation->contact_id) == $contact->id)>
                                    {{ $contact->full_name }} ({{ $contact->role }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Tipo de pricing</label>
                        <select name="pricing_type" class="fc-select" required>
                            @foreach(['fixed','hourly','retainer'] as $type)
                                <option value="{{ $type }}" @selected(old('pricing_type', $quotation->pricing_type) === $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Monto</label>
                        <input type="number" step="0.01" name="amount" value="{{ old('amount', $quotation->amount) }}" class="fc-input" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Moneda</label>
                        <input type="text" name="currency" value="{{ old('currency', $quotation->currency) }}" class="fc-input" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Horas estimadas</label>
                        <input type="number" name="estimated_hours" value="{{ old('estimated_hours', $quotation->estimated_hours) }}" class="fc-input">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Enviada el</label>
                        <input type="date" name="sent_at" value="{{ old('sent_at', optional($quotation->sent_at)->toDateString()) }}" class="fc-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Válida hasta</label>
                        <input type="date" name="valid_until" value="{{ old('valid_until', optional($quotation->valid_until)->toDateString()) }}" class="fc-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Estado</label>
                    <select name="status" class="fc-select" required>
                        @foreach(['draft','sent','viewed','negotiating','accepted','rejected','expired'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $quotation->status) === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Resumen de alcance</label>
                    <textarea name="scope_summary" rows="3" class="fc-textarea">{{ old('scope_summary', $quotation->scope_summary) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Notas internas</label>
                    <textarea name="notes" rows="3" class="fc-textarea">{{ old('notes', $quotation->notes) }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('companies.show', $quotation->company) }}" class="fc-btn fc-btn-secondary">Cancelar</a>
                    <button class="fc-btn fc-btn-primary">Guardar cambios</button>
                </div>
            </form>

            <div class="border-t border-ink-100 pt-4 dark:border-ink-800">
                <x-crm.confirm-action
                    :action="route('quotations.destroy', $quotation)"
                    method="DELETE"
                    title="Eliminar cotización"
                    message="Esta acción eliminará la cotización permanentemente."
                    trigger-label="Eliminar cotización"
                    confirm-label="Sí, eliminar"
                    trigger-class="fc-btn fc-btn-danger fc-btn-sm"
                    confirm-class="fc-btn fc-btn-danger"
                />
            </div>
        </div>
    </div>
</x-layouts::app>

