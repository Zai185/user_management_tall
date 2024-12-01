<div class="flex relative" x-data="{currentNav: @entangle('currentNav'), navmenus: $wire.get('navmenus')}">

    <aside
        class="inset-y-0 left-0 z-40 w-52 space-y-2 overflow-y-auto border-r border-main-border bg-surface px-3 pb-4 pt-2 shadow-sm">

        <div class="flex items-center gap-2">
            <h5 class="font-extrabold">PicoSBSUI</h5>
        </div>

        <ul class="w-full list-none space-y-1 p-1">

            @foreach ($navmenus as $navname => $navmenu)
            @if (auth()->user()->hasPermission($navmenu['feature'], 'view'))
            <x-sidebar-button
                wire:click="update"
                icon="{{$navmenu['icon']}}"
                title="{{$navname}}" />
            @endif
            @endforeach
        </ul>
    </aside>

    <ul wire:loading.class="opacity-0" wire:target="update" wire:transition :class="isModelOpen ? 'min-w-52 px-4': 'min-w-0 px-0'"
        class="origin-left  w-0 inset-y-0 z-40 space-y-2 py-4 overflow-y-auto border-r border-main-border bg-surface transition-all shadow-sm">

        @if (isset($currentNav))
        @foreach ( $navmenus[$currentNav]['links'] as $nav )
        <x-sidebar-sub-element :$nav />
        @endforeach
        @endif
    </ul>

    <x-button wire:click="logout" class="w-52 z-[100] absolute cursor-pointer py-2 bottom-0 left-0">Log out</x-button>
</div>
