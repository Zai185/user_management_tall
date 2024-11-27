<?php

namespace App\Livewire\Components\Roles;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Box extends Component
{
    #[Modelable()]
    public $permissions;
    public $feature;
    public $all = true;

    public function togglePermissions()
    {
        $permissions_id = $this->feature->permissions->pluck('id')->toArray();
        $diff = array_diff($permissions_id, $this->permissions);

        $this->permissions = $diff
            ? [...$this->permissions, ...$diff]
            : $this->permissions = array_diff($this->permissions, $permissions_id);
        $this->all = (bool)$diff;
        $this->dispatch('update_role');
    }

    public function updateRole()
    {
        $this->dispatch('update_role');
        $this->mount();
    }
    public function mount()
    {
        $permissions_id = $this->feature->permissions->pluck('id')->toArray();
        $diff = array_diff($permissions_id, $this->permissions ?? []);
        $this->all = !(bool)$diff;
    }

    public function render()
    {
        return view('livewire.components.roles.box');
    }
}
