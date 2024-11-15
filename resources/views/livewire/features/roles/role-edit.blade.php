<form class="p-4 flex-1" wire:submit="save">
    @csrf
    <h1>Roles</h1>

    <div>
        <input type="text" placeholder="Role Name" wire:model="form.role">
        @error('form.role')
        <x-input-error :$message />
        @enderror
    
    </div>

    <div>
        @foreach ($features as $feature)
        <livewire:components.roles.box :key="$feature->id" :$feature wire:model="form.permissions" />
        @endforeach
        @error('form.permissions')
        <x-input-error :$message />
        @enderror
    </div>

    <button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</button>
</form>