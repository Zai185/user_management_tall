<?php

namespace App\Livewire\Features\Roles;

use App\Livewire\Forms\RoleCreateForm;
use App\Models\Feature;
use App\Models\Role;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RoleCreate extends Component
{

    public RoleCreateForm $form;
    public function store()
    {
        $this->form->submit();
        $this->redirectRoute('roles.index', navigate:true);
    }

    public function render()
    {
        return view(
            'livewire.features.roles.role-create',
            [
                'features' => Feature::with('permissions')->get()
            ]
        );
    }
}
