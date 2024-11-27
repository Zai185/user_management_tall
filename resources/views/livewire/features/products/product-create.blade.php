<form wire:submit="create" class="py-2 px-4 flex-1">
    @csrf
    <h2 class="text-2xl font-medium">Products</h2>
    <div>
        <p class="text-lg">Create Product</p>
        <div>
            <div class="grid grid-cols-2 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Name:</label>
                    <input type="text" placeholder="@name" wire:model="form.name" name="name" class="border w-full py-2 px-4" required>
                </div>
                @error('form.name')
                <x-input-error :$message />
                @enderror
                <div class="w-full">
                    <label class="text-sm font-medium block">SKU:</label>
                    <input type="text" placeholder="@SKU" wire:model="form.SKU" name="SKU" class="border w-full py-2 px-4" required>
                </div>
                @error('form.SKU')
                <x-input-error :$message />
                @enderror
                <div class="w-full col-span-2">
                    <label class="text-sm font-medium block ">Description:</label>
                    <textarea type="text" placeholder="@description" wire:model="form.description" name="description" class="border w-full py-2 px-4" required></textarea>
                </div>
                @error('form.description')
                <x-input-error :$message />
                @enderror
            </div>

            <div class="grid grid-cols-3 gap-4 w-2/3">
                <div class="w-full">
                    <label class="text-sm font-medium block">Purchased Price:</label>
                    <input type="number" placeholder="@purchased_price" wire:model="form.purchased_price" name="purchased_price" class="border w-full py-2 px-4" required>
                </div>
                @error('form.purchased_price')
                <x-input-error :$message />
                @enderror

                <div class="w-full">
                    <label class="text-sm font-medium block">Sale Price:</label>
                    <input type="number" placeholder="@sale_price" wire:model="form.sale_price" name="sale_price" class="border w-full py-2 px-4" required>
                </div>
                @error('form.sale_price')
                <x-input-error :$message />
                @enderror
                
                <div class="w-full col-span-2">
                    <label class="text-sm font-medium block ">Description:</label>
                    <textarea type="text" placeholder="@description" wire:model="form.description" name="description" class="border w-full py-2 px-4" required></textarea>
                </div>
                @error('form.description')
                <x-input-error :$message />
                @enderror
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
                    @error('form.category_id')
                    <x-input-error :$message />
                    @enderror
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
                    @error('form.brand_id')
                    <x-input-error :$message />
                    @enderror
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
                    @error('form.unit_id')
                    <x-input-error :$message />
                    @enderror
                </div>
            </div>
        </div>

        <input type="checkbox" wire:model="form.is_active" name="is_active">
        <label>Is Active</label>
        @error('form.gender')
        <x-input-error :message="$message" />
        @enderror
    </div>
    <button type="submit" class="py-1 rounded-lg px-4 border bg-blue-700 text-white hover:bg-blue-900">submit</button>
</form>