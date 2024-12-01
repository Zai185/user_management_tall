<form class="p-4 flex-1" wire:submit="save">
    @csrf
    <h2>Roles</h2>

    <div class="flex items-center gap-4">
        <label>Role name:</label>
        <x-input  placeholder="Role Name" wire:model="form.role" required />
    </div>
    <x-input-error error="form.role" />

    <div class="odd:bg-blue-500">
        @foreach ($features as $feature)
        <livewire:components.roles.box
            :key="$feature->id"
            :$feature
            
            wire:model="form.permissions" />
        @endforeach
        <x-input-error error="form.permissions" />
    </div>

    <x-button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</x-button>
</form>