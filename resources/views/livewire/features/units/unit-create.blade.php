<form wire:submit="create" class="py-2 px-4 flex-1">
    @csrf
    <h2 class="text-2xl font-medium">Units</h2>
    <div>
        <p class="text-lg">Create Unit</p>
        <div>
            <div class="grid grid-cols-2 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Name:</label>
                    <x-input placeholder="Category Name" wire:model="form.name" required />
                    <x-input-error error="form.name" />
                </div>
            </div>
        </div>
        <x-button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</x-button>
    </div>
</form>