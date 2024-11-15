<form class="p-4 flex-1" wire:submit="store">
    @csrf
    <h2 class="text-2xl font-medium">Roles</h2>
    <p class="text-lg">Role Create</p>

    <div>
        <input type="text" placeholder="Role Name" wire:model="form.role">
        @error('form.role')
        <x-input-error :$message />
        @enderror
    </div>

    <h3 class="my-1 font-medium">Select Permission</h3>
    <div class="border">
        @foreach ($features as $feature)
        <livewire:components.roles.box
            :key="$feature->id"
            :$feature
            wire:model="form.permissions" />
        @endforeach
        @error('form.permissions')
        <x-input-error :$message />
        @enderror
    </div>

    <button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</button>
</form>