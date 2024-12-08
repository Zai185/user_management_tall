<div
    {{$attributes}}
    class="flex items-center hover:text-primary gap-2">
    <span
        class="flex size-6 flex-shrink-0 items-center justify-center [&>svg]:h-5 [&>svg]:w-5">

    </span>
    <a wire:navigate :href="nav.href" class="cursor-pointer capitalize" wire:current="bg-red-800" x-text="nav.title"></a>

</div>