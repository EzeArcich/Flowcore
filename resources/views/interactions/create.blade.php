<x-layouts::app :title="'Nueva interacción · ' . $company->name">
    <div class="fc-page">
        <div class="fc-card max-w-3xl p-6 space-y-6">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Nueva interacción</h1>
                    <p class="text-sm text-ink-500 dark:text-ink-400">
                        Empresa: <span class="font-medium">{{ $company->name }}</span>
                    </p>
                </div>
                <a href="{{ route('companies.show', $company) }}" class="fc-link">Volver a la empresa</a>
            </header>

            <form method="POST" action="{{ route('companies.interactions.store', $company) }}" class="space-y-4">
                @csrf

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
                        <label class="block text-sm font-medium mb-1">Dirección</label>
                        <select name="direction" class="fc-select" required>
                            @foreach(['outbound','inbound'] as $direction)
                                <option value="{{ $direction }}" @selected(old('direction', 'outbound') === $direction)>{{ $direction }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Canal</label>
                        <select name="channel" class="fc-select" required>
                            @foreach(['email','linkedin','whatsapp','call','meeting'] as $channel)
                                <option value="{{ $channel }}" @selected(old('channel') === $channel)>{{ $channel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha y hora</label>
                        <input type="datetime-local" name="interacted_at"
                               value="{{ old('interacted_at') }}" class="fc-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Asunto</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="fc-input">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Mensaje enviado</label>
                    <textarea name="message" rows="4" class="fc-textarea">{{ old('message') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Respuesta recibida</label>
                    <textarea name="response" rows="3" class="fc-textarea">{{ old('response') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Resultado</label>
                        <input type="text" name="outcome" value="{{ old('outcome') }}" class="fc-input">
                    </div>

                    <div class="space-y-2">
                        <label class="inline-flex items-center gap-2 mt-6">
                            <input type="checkbox" name="requires_follow_up" value="1" @checked(old('requires_follow_up'))>
                            <span class="text-sm">Generar follow-up</span>
                        </label>
                        <input type="date" name="follow_up_due_at"
                               value="{{ old('follow_up_due_at') }}" class="fc-input" placeholder="Fecha de follow-up">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Notas internas</label>
                    <textarea name="notes" rows="3" class="fc-textarea">{{ old('notes') }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('companies.show', $company) }}" class="fc-btn fc-btn-secondary">Cancelar</a>
                    <button class="fc-btn fc-btn-primary">Registrar interacción</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>

