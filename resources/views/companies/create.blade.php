<x-layouts::app title="Nueva empresa">
    <div class="crm-page space-y-6">
        <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="crm-kpi-label">Empresa</p>
                <h1 class="text-2xl font-bold text-ink-900 dark:text-ink-50">Nueva empresa</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400">
                    Cargá un lead con contexto comercial real para que el pipeline nazca ordenado y accionable.
                </p>
            </div>

            <a href="{{ route('companies.index') }}" class="crm-btn-secondary">
                Volver al listado
            </a>
        </div>

        <div class="crm-form-shell max-w-5xl">
            <form method="POST" action="{{ route('companies.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="crm-form-section space-y-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="crm-kpi-label">Identidad</p>
                                <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Base del lead</h2>
                            </div>
                            <span class="crm-panel-chip">Alta comercial</span>
                        </div>

                        <div>
                            <label for="name" class="crm-field-label">Nombre</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" class="crm-input" required>
                        </div>

                        <div>
                            <label for="website" class="crm-field-label">Sitio web</label>
                            <input id="website" type="text" name="website" value="{{ old('website') }}" class="crm-input">
                        </div>

                        <div>
                            <label for="industry" class="crm-field-label">Industria</label>
                            <input id="industry" type="text" name="industry" value="{{ old('industry') }}" class="crm-input">
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="country" class="crm-field-label">País</label>
                                <input id="country" type="text" name="country" value="{{ old('country') }}" class="crm-input">
                            </div>

                            <div>
                                <label for="city" class="crm-field-label">Ciudad</label>
                                <input id="city" type="text" name="city" value="{{ old('city') }}" class="crm-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="company_size_min" class="crm-field-label">Equipo mínimo</label>
                                <input id="company_size_min" type="number" min="1" name="company_size_min" value="{{ old('company_size_min') }}" class="crm-input">
                            </div>

                            <div>
                                <label for="company_size_max" class="crm-field-label">Equipo máximo</label>
                                <input id="company_size_max" type="number" min="1" name="company_size_max" value="{{ old('company_size_max') }}" class="crm-input">
                            </div>
                        </div>
                    </div>

                    <div class="crm-form-section space-y-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="crm-kpi-label">Seguimiento</p>
                                <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Estado y timing</h2>
                            </div>
                            <span class="crm-panel-chip">Pipeline</span>
                        </div>

                        <div>
                            <label for="status" class="crm-field-label">Estado comercial</label>
                            <select id="status" name="status" class="crm-select">
                                @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', 'prospect') === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="first_contact_at" class="crm-field-label">Primer contacto</label>
                                <input id="first_contact_at" type="date" name="first_contact_at" value="{{ old('first_contact_at') }}" class="crm-input">
                            </div>

                            <div>
                                <label for="last_contact_at" class="crm-field-label">Último contacto</label>
                                <input id="last_contact_at" type="date" name="last_contact_at" value="{{ old('last_contact_at') }}" class="crm-input">
                            </div>
                        </div>

                        <div>
                            <label for="next_follow_up_at" class="crm-field-label">Próximo follow-up</label>
                            <input id="next_follow_up_at" type="date" name="next_follow_up_at" value="{{ old('next_follow_up_at') }}" class="crm-input">
                        </div>

                        <div class="crm-surface-muted space-y-3">
                            <p class="crm-kpi-label">Visibilidad comercial</p>

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

                <div class="crm-form-section space-y-4">
                    <div>
                        <p class="crm-kpi-label">Contexto</p>
                        <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Notas comerciales</h2>
                    </div>

                    <div>
                        <label for="notes" class="crm-field-label">Notas</label>
                        <textarea id="notes" name="notes" rows="6" class="crm-textarea">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <button class="crm-btn-primary">Guardar empresa</button>
                    <a href="{{ route('companies.index') }}" class="crm-btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
