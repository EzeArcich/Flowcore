<x-layouts::app :title="'Nuevo contacto · ' . $company->name">
    <div class="fc-page space-y-6">
        <div class="fc-page-header flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="fc-kicker">Contacto</p>
                <h1 class="fc-page-title">Nuevo contacto</h1>
                <p class="fc-page-subtitle">
                    Empresa: <span class="font-semibold">{{ $company->name }}</span>
                </p>
            </div>

            <a href="{{ route('companies.show', $company) }}" class="fc-btn fc-btn-secondary">Volver a la empresa</a>
        </div>

        <div class="fc-panel max-w-4xl">
            <form method="POST" action="{{ route('companies.contacts.store', $company) }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="fc-card-soft space-y-4">
                        <div>
                            <p class="fc-kicker">Identidad</p>
                            <h2 class="fc-block-title">Persona de contacto</h2>
                        </div>

                        <div>
                            <label class="fc-label">Nombre completo</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="fc-input" required>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="fc-label">Rol</label>
                                <input type="text" name="role" value="{{ old('role') }}" class="fc-input">
                            </div>

                            <div>
                                <label class="fc-label">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="fc-input">
                            </div>
                        </div>

                        <div>
                            <label class="fc-label">LinkedIn</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" class="fc-input">
                        </div>
                    </div>

                    <div class="fc-card-soft space-y-4">
                        <div>
                            <p class="fc-kicker">Relación</p>
                            <h2 class="fc-block-title">Nivel de contacto</h2>
                        </div>

                        <div>
                            <label class="fc-label">Estado</label>
                            <select name="status" class="fc-select">
                                @foreach(['not_contacted','contacted','replied','unresponsive','invalid'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', 'not_contacted') === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <label class="fc-check-label">
                                <input type="checkbox" name="is_primary" value="1" class="fc-checkbox" @checked(old('is_primary'))>
                                <span>Contacto principal</span>
                            </label>

                            <label class="fc-check-label">
                                <input type="checkbox" name="is_decision_maker" value="1" class="fc-checkbox" @checked(old('is_decision_maker'))>
                                <span>Decision maker</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('companies.show', $company) }}" class="fc-btn fc-btn-secondary">Cancelar</a>
                    <button class="fc-btn fc-btn-primary">Guardar contacto</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
