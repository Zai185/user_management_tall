<?php

namespace App\Livewire\Components\Roles;

use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Box extends Component
{
    #[Modelable()]
    public $permissions;
    public $feature;
    public bool $all;

    // public function togglePermissions()
    // {
    //     $permissions_id = $this->feature->permissions->pluck('id')->toArray();
    //     $this->permissions = $this->hasRemainingTicks()
    //         ? [...$this->permissions, ...$this->remainingTicks()]
    //         : array_diff($this->permissions, $permissions_id);

    //     $this->all = !$this->hasRemainingTicks();
    // }

    public function mount()
    {
        $this->all = !$this->hasRemainingTicks(); // true if there is remaining ticks whcih mean not all tick,
    }

    /**
     * Return remaining checkboxes
     * @return array
     */
    public function remainingTicks()
    {
        $permissions_id = $this->feature->permissions->pluck('id')->toArray(); // get all permission
        return array_diff($permissions_id, $this->permissions); // all permission - current permission = the unticked permisison
    }
    /**
     * Check if there is remaining ticks
     * @return bool
     */
    public function hasRemainingTicks()
    {
        return count($this->remainingTicks()) > 0; // if unticked permission count > 0 means there is remaining tick
    }

    public function render()
    {

        return view('livewire.components.roles.box');
    }
}
