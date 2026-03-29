@php
    $successMessage = session('success');
    $errorMessages = $errors->all();
@endphp

@if($successMessage || $errors->any())
    <div class="fc-alert-stack mb-6">
        @if($successMessage)
            <div
                x-data="{ shown: true }"
                x-show="shown"
                x-transition.opacity.duration.250ms
                class="fc-alert fc-alert--success"
            >
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="fc-alert-title">Operación exitosa</p>
                        <p class="fc-alert-body">{{ $successMessage }}</p>
                    </div>

                    <button
                        type="button"
                        class="fc-btn fc-btn-secondary fc-btn-sm shrink-0"
                        @click="shown = false"
                    >
                        Cerrar
                    </button>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="fc-alert fc-alert--error">
                <p class="fc-alert-title">Revisá el formulario</p>
                <p class="fc-alert-body">Hay datos que necesitan corrección antes de guardar.</p>

                <ul class="fc-alert-list">
                    @foreach(array_slice($errorMessages, 0, 5) as $message)
                        <li>• {{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endif
