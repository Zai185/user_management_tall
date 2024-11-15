<?php

namespace App\Livewire\Forms;

use App\Models\Role;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RoleCreateForm extends Form
{
    #[Validate('required|string|unique:roles,name')]
    public $role = '';
    #[Validate('required|array')]
    public $permissions = [];

    public function submit()
    {
        $this->validate();
        $role = Role::create([
            'name' => strtolower($this->role)
        ]);
        $role->permissions()->attach($this->permissions);
    }
}
