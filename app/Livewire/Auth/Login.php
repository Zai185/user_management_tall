<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{

    public $email = '';
    public $password = '';
    public function rules()
    {

        return [
            'email' => 'required|email|exists:admin_users,email',
            'password' => 'required'
        ];
    }

    public function login()
    {
        $this->validate();

        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            $this->addError('login-error', "Credential wrong");
            return;
        }

        Session::regenerate();
        $this->redirectRoute('dashboard', navigate: true);
    }


    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
