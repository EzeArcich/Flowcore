@props([
    'action',
    'method' => 'POST',
    'title' => 'Confirmar acción',
    'message' => '¿Estás seguro de continuar?',
    'confirmLabel' => 'Confirmar',
    'cancelLabel' => 'Cancelar',
    'triggerLabel' => 'Continuar',
    'triggerClass' => 'fc-btn fc-btn-secondary fc-btn-sm',
    'confirmClass' => 'fc-btn fc-btn-primary',
    'dialogId' => null,
])

@php
    $resolvedDialogId = $dialogId ?: 'fc-confirm-' . \Illuminate\Support\Str::ulid();
    $resolvedMethod = strtoupper($method);
@endphp

<div class="inline-flex">
    <button type="button" class="{{ $triggerClass }}" onclick="document.getElementById('{{ $resolvedDialogId }}')?.showModal()">
        {{ $triggerLabel }}
    </button>

    <dialog id="{{ $resolvedDialogId }}" class="fc-confirm-dialog">
        <div class="fc-confirm-card">
            <h3 class="text-base font-semibold text-ink-900 dark:text-ink-50">{{ $title }}</h3>
            <p class="mt-2 text-sm text-ink-600 dark:text-ink-300">{{ $message }}</p>

            <div class="mt-6 flex items-center justify-end gap-3">
                <button type="button" class="fc-btn fc-btn-secondary" onclick="document.getElementById('{{ $resolvedDialogId }}')?.close()">
                    {{ $cancelLabel }}
                </button>

                <form method="POST" action="{{ $action }}" class="inline">
                    @csrf
                    @if($resolvedMethod !== 'POST')
                        @method($resolvedMethod)
                    @endif

                    <button type="submit" class="{{ $confirmClass }}">
                        {{ $confirmLabel }}
                    </button>
                </form>
            </div>
        </div>
    </dialog>
</div>

