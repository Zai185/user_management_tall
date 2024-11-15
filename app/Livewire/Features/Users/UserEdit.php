<?php

namespace App\Livewire\Features\Users;

use App\Livewire\Forms\UserEditForm;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public User $user;
    public UserEditForm $form;

    public function mount(User $user){
        if($this->user->id === 1) abort(404);
        $this->user = $user;
        $this->form->mount($user);
    }

    public function save(){
        $this->form->submit($this->user);
        $this->redirectRoute(name: 'users.index', navigate:true);

    }

    public function render()
    {
        return view(
            'livewire.features.users.user-edit',
            [
                'roles' => Role::all()
            ]
        );
    }
}
