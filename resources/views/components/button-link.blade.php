<a href="{{$href}}"
    {{$attributes->merge(["class"=>"block min-w-20 w-fit py-2 my-2 items-center justify-center gap-1 rounded-md bg-primary px-3 text-sm text-primary-text transition-colors duration-150 hover:bg-primary/90 active:brightness-95"])}}>
    {{$slot}}
</a>