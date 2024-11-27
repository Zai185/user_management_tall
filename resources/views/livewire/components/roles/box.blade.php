<div class="flex items-center gap-12 py-3 px-2 mb-2 even:bg-blue-50">

    <h3 class="capitalize w-24">{{$feature->name}}</h3>
    <div class="flex items-center gap-2" x-data="{permissions: @entangle('permissions')}">
        <div class="block" x-data="{isChecked : $all}">
            <input
                wire:click="togglePermissions"
                wire:target="updateRole"
                x-checked="false"
                type="checkbox">
            <label class="capitalize">All</label>
        </div>
        @foreach ($feature->permissions as $permission)

        <div class="block" wire:key="{{$permission->id}}">
            <input
                type="checkbox"
                x-model="permissions"
                wire:click="updateRole"
                value={{$permission->id}}>
            
            <label class="capitalize">{{$permission->name}}</label>
        </div>
        @endforeach
    </div>
</div>
