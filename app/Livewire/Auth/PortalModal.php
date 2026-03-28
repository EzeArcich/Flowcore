<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class PortalModal extends Component
{
    public string $initialMode = 'login';

    public function mount(string $initialMode = 'login'): void
    {
        $this->initialMode = in_array($initialMode, ['login', 'register'], true)
            ? $initialMode
            : 'login';
    }

    public function render(): View
    {
        return view('livewire.auth.portal-modal');
    }
}
