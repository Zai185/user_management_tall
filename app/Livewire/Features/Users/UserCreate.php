<?php

namespace App\Livewire\Features\Users;

use App\Livewire\Forms\UserCreateForm;
use App\Models\Role;
use Livewire\Component;

class UserCreate extends Component
{

    public UserCreateForm $form;

    public function create()
    {
        $this->form->submit();
        $this->redirectRoute('users.index', navigate: true);
    }
    public function render()
    {
        return view(
            'livewire.features.users.user-create',
            [
                'roles' => Role::all()
            ]
        );
    }
}
