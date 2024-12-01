<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserCreateForm extends Form
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $address;
    public $phone;
    public $gender;
    public $is_active;
    public $role_id = '';

    public function rules()
    {
        return [
            'name' => 'required|string|max:128',
            'username' => 'required|string|max:32',
            'email' => 'required|email|unique:admin_users,email',
            'password' => ['required', Password::defaults()],
            'address' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|boolean',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        if ($this->is_active) $data['is_active'] = $this->is_active;
        User::create($data);
        session()->flash('success', 'User Created Successfully');
    }
}
