<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserEditForm extends Form
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $address;
    public $phone;
    public $gender;
    public $is_active;
    public $role_id;

    public function rules(User $user)
    {
        return [
            'name' => 'required|string|max:128',
            'username' => 'required|string|max:32',
            'email' => 'required|email|unique:admin_users,email,' . $user->id,
            'password' => ['nullable', Password::defaults()],
            'address' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|boolean',
            'is_active' => 'required|boolean',
            'role_id' => 'required|integer|exists:roles,id'
        ];
    }

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->phone = $user->phone;
        $this->gender = $user->gender;
        $this->is_active = $user->is_active;
        $this->role_id = $user->role_id;    
    }

    public function submit(User $user)
    {
        $validated_user = $this->validate($this->rules($user)); 
        if(!$validated_user['password']) {
            $validated_user['password'] = Hash::make($user->password);
        }
        $user->update($validated_user);
        session()->flash('success', "User Updated Successfully");
    }
}
