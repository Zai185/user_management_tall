<?php

namespace App\Livewire\Features\Roles;

use App\Models\Feature;
use App\Models\Role;
use Livewire\Attributes\On;
use Livewire\Component;

class RoleIndex extends Component
{

    public function delete($role_id)
    {
        Role::findOrFail($role_id)->delete();
    }
    #[On('update_role')]
    public function render()
    {

        $roles = Role::where('id', '!=', 1)->paginate(10);
        return view(
            'livewire.features.roles.role-index',
            [
                'roles' => $roles,
                'feature' => Feature::where('name', 'roles')->first()
            ]
        );
    }
}
