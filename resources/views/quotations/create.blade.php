<x-layouts::app :title="'Nueva cotización · ' . $company->name">
    <div class="fc-page">
        <div class="fc-card max-w-3xl p-6 space-y-6">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Nueva cotización</h1>
                    <p class="text-sm text-ink-500 dark:text-ink-400">
                        Empresa: <span class="font-medium">{{ $company->name }}</span>
                    </p>
                </div>
                <a href="{{ route('companies.show', $company) }}" class="fc-link">Volver a la empresa</a>
            </header>

            <form method="POST" action="{{ route('companies.quotations.store', $company) }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1">Título</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="fc-input" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Contacto</label>
                        <select name="contact_id" class="fc-select">
                            <option value="">Sin contacto específico</option>
                            @foreach($company->contacts as $contact)
                                <option value="{{ $contact->id }}" @selected(old('contact_id') == $contact->id)>
                                    {{ $contact->full_name }} ({{ $contact->role }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Tipo de pricing</label>
                        <select name="pricing_type" class="fc-select" required>
                            @foreach(['fixed','hourly','retainer'] as $type)
                                <option value="{{ $type }}" @selected(old('pricing_type', 'fixed') === $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Monto</label>
                        <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="fc-input" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Moneda</label>
                        <input type="text" name="currency" value="{{ old('currency', 'USD') }}" class="fc-input" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Horas estimadas</label>
                        <input type="number" name="estimated_hours" value="{{ old('estimated_hours') }}" class="fc-input">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Enviada el</label>
                        <input type="date" name="sent_at" value="{{ old('sent_at') }}" class="fc-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Válida hasta</label>
                        <input type="date" name="valid_until" value="{{ old('valid_until') }}" class="fc-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Estado</label>
                    <select name="status" class="fc-select" required>
                        @foreach(['draft','sent','viewed','negotiating','accepted','rejected','expired'] as $status)
                            <option value="{{ $status }}" @selected(old('status', 'draft') === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Resumen de alcance</label>
                    <textarea name="scope_summary" rows="3" class="fc-textarea">{{ old('scope_summary') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Notas internas</label>
                    <textarea name="notes" rows="3" class="fc-textarea">{{ old('notes') }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('companies.show', $company) }}" class="fc-btn fc-btn-secondary">Cancelar</a>
                    <button class="fc-btn fc-btn-primary">Guardar cotización</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>

