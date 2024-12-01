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
                        <x-input placeholder="e.g. John" wire:model="form.name" required />
                        <x-input-error error="form.name" />
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Username:</label>
                        <x-input placeholder="e.g. @john" wire:model="form.username" required />
                        <x-input-error error="form.username" />
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Phone:</label>
                        <x-input placeholder="+94943234234" wire:model="form.phone" required />
                        <x-input-error error="form.phone" />
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Address:</label>
                        <x-input placeholder="e.g. Yangon, Myanmar" wire:model="form.address" required />
                        <x-input-error error="form.address" />

                    </div>

                </fieldset>
                <fieldset class="space-y-2 w-full border border-gray-800 px-2 pb-2 mb-4">
                    <legend>Account Information</legend>
                    <div>
                        <label class="text-sm font-medium block">Email:</label>
                        <x-input placeholder="john@example.com" wire:model="form.email" required />
                        <x-input-error error="form.email" />
                    </div>

                    <div>
                        <label class="text-sm font-medium block">Password:</label>
                        <x-input placeholder="********" wire:model="form.password" required />
                        <x-input-error error="form.password" />

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
                        <x-input-error error="form.role_id" />

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
    <x-button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</x-button>
</form>