<?php

namespace App\Livewire\Features\Users;

use App\Models\Feature;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{

    use WithPagination;

    public function delete($user_id)
    {
        User::findOrFail($user_id)->delete();
        if (User::whereNot('id', 1)->paginate(10)->isEmpty() && $this->page > 1) {
            $this->previousPage();
        }
    }
    
    
    public function render()
    {
        $users = User::latest()->whereNot('id', 1)->paginate(10);

        return view(
            'livewire.features.users.user-index',
            [
                'users' => $users,
                'feature' => Feature::where('name', 'users')
                    ->first(),

            ]
        );
    }
}
