<?php

namespace App\Livewire\Forms;

use App\Models\Role;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RoleEditForm extends Form
{
    public $role;
    public $permissions;

    public function rules(Role $role)
    {
        return [
            'role' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'required|array'
        ];
    }
    public function mount(Role $role)
    {
        $this->role = $role->name;
        $this->permissions = $role->permissions->pluck('id')->toArray();
    }

    public function submit(Role $role)
    {
        $this->validate($this->rules($role));
        $role->name = $this->role;
        $role->save();
        $role->permissions()->sync($this->permissions);
        session()->flash('message', 'User updated successfully');
    }
}
