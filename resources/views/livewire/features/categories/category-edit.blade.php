<form wire:submit="save" class="py-2 px-4 flex-1">
    @csrf
    <h2 class="text-2xl font-medium">Categories</h2>
    <div>
        <p class="text-lg">Update Category</p>
        <div class="w-1/3">

            <div class="w-full">
                <label class="text-sm font-medium block">Name:</label>
                <x-input placeholder="Category Name" wire:model="form.name" required />
                <x-input-error error="form.name" />
            </div>

            <div class="w-full">
                <label class="text-sm font-medium block">Category:</label>
                <select wire:model="form.category_id" name="category_id" class="w-full border py-2 px-4">
                    <option value="" selected>None</option>
                    @foreach ($categories as $c)
                    @if($c->id !== $form->id)
                    <option value="{{$c->id}}" {{$c->id ==  $category->category_id ? 'selected' : ''}}>
                        {{$c->name}}
                    </option>
                    @endif
                    @endforeach
                </select>
                <x-input-error error="form.category_id" />
            </div>
        </div>
        <x-button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</x-button>
    </div>
</form>