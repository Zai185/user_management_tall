<form wire:submit="update" class="py-2 px-4 flex-1">
    @csrf
    <h2 class="text-2xl font-medium">Products</h2>
    <div>
        <p class="text-lg">Update Product</p>
        <div>
            <div class="grid grid-cols-2 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Name:</label>
                    <x-input placeholder="Role Name" wire:model="form.name" required />
                    <x-input-error error="form.name" />
                </div>
                <div class="w-full">
                    <label class="text-sm font-medium block">SKU:</label>
                    <x-input placeholder="Role Name" wire:model="form.SKU" required min="8" max="12" />
                    <x-input-error error="form.SKU" />
                </div>
                <div class="w-full col-span-2">
                    <label class="text-sm font-medium block ">Description:</label>
                    <textarea type="text" placeholder="@description" wire:model="form.description" name="description" class="border w-full py-2 px-4" required></textarea>
                    <x-input-error error="form.description" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Purchased Price:</label>
                    <x-input
                        type="number" placeholder="Role Name" wire:model="form.purchased_price" required />
                    <x-input-error error="form.purchased_price" />
                </div>

                <div class="w-full">
                    <label class="text-sm font-medium block">Sale Price:</label>
                    <x-input type="number" placeholder="Role Name" wire:model="form.sale_price" required />
                    <x-input-error error="form.sale_price" />
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Category:</label>
                    <select wire:model="form.category_id" name="category_id" class="w-full border py-2 px-4" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error error="category_id" />
                </div>

                <div class="w-full">
                    <label class="text-sm font-medium block">Brand:</label>
                    <select wire:model="form.brand_id" name="brand_id" class="w-full border py-2 px-4" required>
                        <option value="" disabled selected>Select a brand</option>
                        @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">
                            {{$brand->name}}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error error="form.brand_id" />
                </div>

                <div class="w-full">
                    <label class="text-sm font-medium block">Unit:</label>
                    <select wire:model="form.unit_id" name="unit_id" class="w-full border py-2 px-4" required>
                        <option value="" disabled selected>Select a unit</option>
                        @foreach ($units as $unit)
                        <option value="{{$unit->id}}">
                            {{$unit->name}}
                        </option>
                        @endforeach
                    </select>
                    <x-input-error error="form.unit_id" />
                </div>

            </div>
        </div>

        <x-checkbox wire:model="form.is_active" name="is_active" />
        <label>Is Active</label>
        <x-input-error error="form.gender" />
    </div>
    <input
        type="file"
        multiple
        accept="image/*"
        wire:model="form.images"
        class="block w-full mb-4" />

    <div id="img-box" class="flex gap-1"></div>
    <p>Photo Preview:</p>
    <x-icons.spinner wire:loading wire:target='form.images'></x-icons.spinner>
    @if ($form->images)

    <div class="mb-4 flex gap-1">
        @foreach ($form->images as $image)
        <img src="{{$image->img_path }}" alt="Preview" class="size-32 border border-gray-800 rounded">
        @endforeach
    </div>

    @endif

    <x-button type="submit">submit</x-button>
</form>