<form class="p-4 flex-1" wire:submit="store">
    @csrf
    <h2>Roles</h2>
    <h6>Role Create</h6>
    <div>
        <x-input placeholder="Role Name" wire:model="form.role" class="!w-56" required />
        <x-input-error error="form.role" />
    </div>

    <h6 class="my-1">Select Permission</h6>
    <div class="border group odd:bg-blue-500">
        @foreach ($features as $index=> $feature)
        <livewire:components.roles.box
            :key="$feature->id"
            :$feature
            :$index
            wire:model="form.permissions" />
        @endforeach
        <x-input-error error="form.permissions" />
    </div>

    <x-button>submit</x-button>
</form>