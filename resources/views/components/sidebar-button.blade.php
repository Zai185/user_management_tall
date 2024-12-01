<a
    @click="isModelOpen = true;currentNav='{{$title}}'"
    {{$attributes->merge(
        ['class'=>"inline-flex h-10 w-full cursor-pointer items-center justify-center gap-2 rounded-md bg-gray-100 text-gray-800 px-3 py-2 text-sm transition hover:bg-primary hover:text-primary-text",
    ]
    )}}>


    <span
        class="flex size-5 flex-shrink-0 items-center justify-center [&>svg]:h-5 [&>svg]:w-5">
        @includeIf("components.icons.$icon")
    </span>
    <div class="flex-1 text-left">
        <p class="flex-1 font-medium capitalize">{{$title}}</p>
    </div>

</a>