<div x-data="{all: '{{$all}}', permissions: @entangle('permissions'), permissionLength: {{$feature->permissions->count()}}, feature: {{$feature}},...init()}" class="flex items-center gap-12 py-2 px-2 mb-2 even:bg-blue-50">

    <p class="capitalize w-20">{{$feature->name}}</p>
    <div class="flex items-center gap-2" x-data="">
        <div class="block">
            <x-checkbox
                @click="tickAll"
                wire:model="all"
                x-model="all" />
            <label class="capitalize">All</label>
        </div>
        @foreach ($feature->permissions as $permission)

        <div class="block" wire:key="{{$permission->id}}">
            <x-checkbox
                x-model="permissions"
                class="{{$feature->name}}"
                @click="updateTick"
                value="{{$permission->id}}" />

            <label class="capitalize">{{$permission->name}}</label>
        </div>
        @endforeach
    </div>
</div>

<script>
    function init() {
        return {
            saySome: function() {
                console.log(this.permissions)
            },
            tickAll: function() {
                var checkboxes = document.querySelectorAll('.' + this.feature.name)
                var checkedCheckboxes = document.querySelectorAll('.' + this.feature.name + ':checked');
                markAs = !this.all
                checkboxes.forEach(c => {
                    if (c.checked !== markAs) {
                        c.click()
                    }
                });
            },
            updateTick: function() {
                var checkedCheckboxes = document.querySelectorAll('.' + this.feature.name + ':checked');
                this.all = checkedCheckboxes.length == this.permissionLength
            }
        }
    }
</script>