<x-layouts::app title="Nueva empresa">
    <div class="fc-page space-y-6">
        <div class="fc-page-header flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="fc-kicker">Empresa</p>
                <h1 class="fc-page-title">Nueva empresa</h1>
                <p class="fc-page-subtitle">
                    Cargá un lead con contexto comercial real para que el pipeline nazca ordenado y accionable.
                </p>
            </div>

            <a href="{{ route('companies.index') }}" class="fc-btn fc-btn-secondary">
                Volver al listado
            </a>
        </div>

        <div class="fc-panel max-w-5xl">
            <form method="POST" action="{{ route('companies.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="fc-card-soft space-y-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="fc-kicker">Identidad</p>
                                <h2 class="fc-block-title">Base del lead</h2>
                            </div>
                            <span class="fc-chip fc-chip-accent">Alta comercial</span>
                        </div>

                        <div>
                            <label for="name" class="fc-label">Nombre</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" class="fc-input" required>
                        </div>

                        <div>
                            <label for="website" class="fc-label">Sitio web</label>
                            <input id="website" type="text" name="website" value="{{ old('website') }}" class="fc-input">
                        </div>

                        <div>
                            <label for="industry" class="fc-label">Industria</label>
                            <input id="industry" type="text" name="industry" value="{{ old('industry') }}" class="fc-input">
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="country" class="fc-label">País</label>
                                <input id="country" type="text" name="country" value="{{ old('country') }}" class="fc-input">
                            </div>

                            <div>
                                <label for="city" class="fc-label">Ciudad</label>
                                <input id="city" type="text" name="city" value="{{ old('city') }}" class="fc-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="company_size_min" class="fc-label">Equipo mínimo</label>
                                <input id="company_size_min" type="number" min="1" name="company_size_min" value="{{ old('company_size_min') }}" class="fc-input">
                            </div>

                            <div>
                                <label for="company_size_max" class="fc-label">Equipo máximo</label>
                                <input id="company_size_max" type="number" min="1" name="company_size_max" value="{{ old('company_size_max') }}" class="fc-input">
                            </div>
                        </div>
                    </div>

                    <div class="fc-card-soft space-y-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="fc-kicker">Seguimiento</p>
                                <h2 class="fc-block-title">Estado y timing</h2>
                            </div>
                            <span class="fc-chip fc-chip-process">Pipeline</span>
                        </div>

                        <div>
                            <label for="status" class="fc-label">Estado comercial</label>
                            <select id="status" name="status" class="fc-select">
                                @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', 'prospect') === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="first_contact_at" class="fc-label">Primer contacto</label>
                                <input id="first_contact_at" type="date" name="first_contact_at" value="{{ old('first_contact_at') }}" class="fc-input">
                            </div>

                            <div>
                                <label for="last_contact_at" class="fc-label">Último contacto</label>
                                <input id="last_contact_at" type="date" name="last_contact_at" value="{{ old('last_contact_at') }}" class="fc-input">
                            </div>
                        </div>

                        <div>
                            <label for="next_follow_up_at" class="fc-label">Próximo follow-up</label>
                            <input id="next_follow_up_at" type="date" name="next_follow_up_at" value="{{ old('next_follow_up_at') }}" class="fc-input">
                        </div>

                        <div class="fc-surface-soft space-y-3">
                            <p class="fc-kicker">Visibilidad comercial</p>

                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" name="is_priority" value="1" @checked(old('is_priority'))>
                                <span>Lead prioritario</span>
                            </label>

                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                                <span>Empresa activa</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="fc-card-soft space-y-4">
                    <div>
                        <p class="fc-kicker">Contexto</p>
                        <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Notas comerciales</h2>
                    </div>

                    <div>
                        <label for="notes" class="fc-label">Notas</label>
                        <textarea id="notes" name="notes" rows="6" class="fc-textarea">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <button class="fc-btn fc-btn-primary">Guardar empresa</button>
                    <a href="{{ route('companies.index') }}" class="fc-btn fc-btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
