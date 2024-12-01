<div
    class="flex items-center hover:text-primary gap-2">
    <span
        class="flex size-6 flex-shrink-0 items-center justify-center [&>svg]:h-5 [&>svg]:w-5">
        @includeIf("components.icons.". $nav['icon'])
    </span>
    <a href="{{$nav['href']}}" class="cursor-pointer capitalize"  wire:current="bg-red-800">{{$nav['title']}}</a>

</div>