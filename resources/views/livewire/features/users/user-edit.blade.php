<form wire:submit="save" class="py-2 px-4 flex-1">
    @csrf
    <h2 class="text-2xl font-medium">Users</h2>
    <div>
        <p class="text-lg">Create User</p>
        <div>
            <div class="grid grid-cols-2 gap-4">
                <fieldset class=" space-y-2 w-full border border-gray-800 px-2 mb-4 pb-2">
                    <legend>Personal Information</legend>
                    <div>
                        <label class="text-sm font-medium block">Name:</label>
                        <input type="text" placeholder="Name" wire:model="form.name" name="name" class="border w-full py-2 px-4" required>
                        @error('form.name')
                        <x-input-error :$message />
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Username:</label>
                        <input type="text" placeholder="@username" wire:model="form.username" name="username" class="border w-full py-2 px-4" required>
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Phone:</label>
                        <input type="text" placeholder="+123456789" wire:model="form.phone" name="phone" class="border w-full py-2 px-4" required>
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Address:</label>
                        <input type="text" placeholder="No.2, John San st." wire:model="form.address" name="address" class="w-full border py-2 px-4 " required>
                        @error('form.address')
                        <x-input-error :$message />
                        @enderror
                    </div>

                </fieldset>
                <fieldset class="space-y-2 w-full border border-gray-800 px-2 pb-2 mb-4">
                    <legend>Account Information</legend>
                    <div>
                        <label class="text-sm font-medium block">Email:</label>
                        <input type="email" placeholder="user@example.com" wire:model="form.email" name="email" class="w-full border py-2 px-4" required>
                        @error('form.email')
                        <x-input-error :$message />
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Password:</label>
                        <input type="password" placeholder="********" wire:model="form.password" name="password" class="w-full border py-2 px-4">
                        @error('form.password')
                        <x-input-error :$message />
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Role:</label>
                        <select wire:model="form.role_id" name="role_id" class="w-full border py-2 px-4" required>
                            <option value="" disabled selected>Select a role</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">
                                {{$role->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('form.role_id')
                        <x-input-error :$message />
                        @enderror
                    </div>

                </fieldset>
            </div>
        </div>
        <div>
            <input type="radio" wire:model="form.gender" name="gender" value="0">
            <label>Male</label>
            <input type="radio" wire:model="form.gender" name="gender" value="1">
            <label>Female</label>
            @error('form.gender')
            <x-input-error :message="$message" />
            @enderror
        </div>

        <input type="checkbox" wire:model="form.is_active" name="is_active" {{$form->is_active ? 'checked' : ''}}>
        <label>Is Active</label>
    </div>
    <button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</button>
</form>