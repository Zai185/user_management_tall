<?php

namespace App\Livewire\Features\Roles;

use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use App\Models\Role;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class RoleIndex extends Component
{

    #[On('update_role')]
    public function delete($role_id)
    {
        Role::findOrFail($role_id)->delete();
    }
    public function render()
    {
        return view(
            'livewire.features.roles.role-index',
            [
                'roles' => Role::whereNot('id', 1)
                    ->paginate(10),
                'feature' => Feature::where('name', 'roles')->first()
            ]
        );
    }
}
