<form wire:submit="create" class="py-2 px-4 flex-1">
    @csrf
    <h2 class="text-2xl font-medium">Brands</h2>
    <div>
        <p class="text-lg">Create Brand</p>
        <div>
            <div class="grid grid-cols-2 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Name:</label>
                    <input type="text" placeholder="@name" wire:model="form.name" name="name" class="border w-full py-2 px-4" required>
                </div>
                @error('form.name')
                <x-input-error :$message />
                @enderror
            </div>
        </div>
        <button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</button>
    </div>
</form>