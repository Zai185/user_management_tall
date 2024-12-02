<div class="flex relative " x-data="{currentNav: @entangle('currentNav'), navmenus: $wire.get('navmenus')}">

    <aside
        class=" h-screen flex flex-col gap-2 finset-y-0 left-0 z-40 w-52 space-y-2 overflow-y-auto border-r border-main-border bg-surface px-3 pb-4 pt-2 shadow-sm">

        <div class="flex items-center gap-2">
            <h5 class="font-bold">PicoSBS</h5>
        </div>

        <ul class="w-full space-y-1 p-1">

            @foreach ($navmenus as $navname => $navmenu)
            @if (auth()->user()->hasPermission($navmenu['feature'], 'view'))
            <x-sidebar-button
                wire:click="update"
                icon="{{$navmenu['icon']}}"
                title="{{$navname}}" />
            @endif
            @endforeach
            <div class="flex-1"></div>
        </ul>
        <div class="flex-1"></div>
        <x-button wire:click="logout">Log out</x-button>
    </aside>

    <ul wire:loading.class="opacity-0" wire:target="update" wire:transition :class="isModelOpen ? 'min-w-52 px-4': 'min-w-0 px-0'"
        class="origin-left  w-0 inset-y-0 z-40 space-y-2 py-4 overflow-y-auto border-r border-main-border bg-surface transition-all shadow-sm">

        @if (isset($currentNav))
        @foreach ( $navmenus[$currentNav]['links'] as $nav )
        @if (!isset($nav['middleware']) || auth()->user()->hasPermission(...$nav['middleware']))
        <x-sidebar-sub-element :$nav />
        @endif
        @endforeach
        @endif
    </ul>

</div>