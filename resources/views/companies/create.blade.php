<x-layouts::app title="Nueva empresa">
    <div class="bg-white rounded-xl shadow p-6 max-w-3xl">
        <form method="POST" action="{{ route('companies.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Sitio web</label>
                    <input type="text" name="website" value="{{ old('website') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Industria</label>
                    <input type="text" name="industry" value="{{ old('industry') }}" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">País</label>
                    <input type="text" name="country" value="{{ old('country') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Ciudad</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Estado</label>
                    <select name="status" class="w-full border rounded px-3 py-2">
                        @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                            <option value="{{ $status }}" @selected(old('status', 'prospect') === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Notas</label>
                <textarea name="notes" rows="5" class="w-full border rounded px-3 py-2">{{ old('notes') }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_priority" value="1">
                    <span>Prioritaria</span>
                </label>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" checked>
                    <span>Activa</span>
                </label>
            </div>

            <div>
                <button class="bg-black text-white rounded px-4 py-2">Guardar empresa</button>
            </div>
        </form>
    </div>
</x-layouts::app>
