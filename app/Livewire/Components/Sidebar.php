<?php

namespace App\Livewire\Components;

use App\Models\Feature;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{

    public $currentNav;
    public $navmenus;
    public $icons;
    public function logout()
    {
        auth('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('login', navigate: true);
    }

    public function getIcon($icon)
    {

        return view("components.icons.tag");
    }

    public function mount()
    {
        $this->currentNav = trim(request()->route()->getPrefix(), 
        "/");
        $this->navmenus = config('navbar.navmenus');
        $this->icons = config('navbar.icons');
    }

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
