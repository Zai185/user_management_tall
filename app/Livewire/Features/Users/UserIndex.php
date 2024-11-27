<?php

namespace App\Livewire\Features\Users;

use App\Models\Feature;
use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function delete($user_id){
        User::findOrFail($user_id)->delete();
    }
    public function render()
    {
        return view('livewire.features.users.user-index',
    [
        'users' => User::whereNot('id', 1)->paginate(10),
        'feature' => Feature::where('name', 'users')
        ->first()

    ]);
    }
}
