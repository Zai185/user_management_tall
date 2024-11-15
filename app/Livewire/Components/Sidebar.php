<?php

namespace App\Livewire\Components;

use App\Models\Feature;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Sidebar extends Component
{
    public function logout()
    {
        auth('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('login', navigate: true);
    }
    public function render()
    {
        return view(
            'livewire.components.sidebar',
            [
                'features' => Feature::all()
            ]
        );
    }
}
