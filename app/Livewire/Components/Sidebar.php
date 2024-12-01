<?php

namespace App\Livewire\Components;

use App\Models\Feature;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{

    public $navmenus;
    public string $currentNav;

    public function update()
    {

        // $this->currentNav = $navname;
        $this->dispatch('update_sidebar');
    }
    public function logout()
    {
        auth('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('login', navigate: true);
    }

    public function mount()
    {
        $this->navmenus = config('navbar');
    }

    #[On('update_sidebar')]
    public function render()
    {
        return view(
            'livewire.components.sidebar',
            [
                'features' => Feature::all()->pluck('name')->toArray(),
            ]
        );
    }
}
