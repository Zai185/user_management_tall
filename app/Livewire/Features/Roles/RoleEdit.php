<?php

namespace App\Livewire\Features\Roles;

use App\Livewire\Forms\RoleEditForm;
use App\Models\Feature;
use App\Models\Role;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RoleEdit extends Component
{
    public Role $role;
    public RoleEditForm $form;
    public function save()
    {
        $this->form->submit($this->role);
        $this->redirectRoute('roles.index', navigate: true);
    }

    public function mount(Role $role)
    {
        if ($this->role->id === 1) abort(404);
        $this->role = $role;
        $this->form->mount($role);
    }
    public function render()
    {
        return view(
            'livewire.features.roles.role-edit',
            [
                'features' => Feature::with('permissions')->get()
            ]
        );
    }
}
