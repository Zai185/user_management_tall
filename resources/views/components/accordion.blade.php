@props(['feature'])

@if(Auth::check() && Auth::user()->hasPermission($feature, 'view'))
<div x-data="{ open: false}" class="border-b border-slate-200">
    <button class="w-full flex justify-between items-center py-2 text-white px-2 bg-gray-700" @click=" open= !open">

        <span class="capitalize">{{$feature}}</span>
        <span class="text-white transition-transform duration-300" x-bind:class="{'rotate-180' : open}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
            </svg>
        </span>
        </button>
        <div x-ref="content" class="h-0 overflow-hidden transition-all duration-300 ease-in-out" x-bind:style="{height: open ? 'auto' : 0}">
            <!-- // TODO FIX HERE FOR scrollHeight  -->
            <a href="{{route($feature. '.index')}}" wire:navigate class="border-t block text-sm text-white text-left  bg-zinc-700 w-full  py-2 px-4">
                View
            </a>

            @if(Auth::user()->hasPermission($feature,'create'))
            <a href="{{route($feature. '.create')}}" wire:navigate class="border-t block text-sm text-white text-left  bg-zinc-700 w-full  py-2 px-4">
                Create
            </a>

            @endif

            <div>
                {{$slot}}
            </div>
        </div>
</div>
@endif