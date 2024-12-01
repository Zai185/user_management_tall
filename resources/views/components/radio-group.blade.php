<div class="inline-flex items-center gap-1">
    <input
        type="radio"
        {{$attributes}}
        class="before:content[''] peer relative h-4 w-4 cursor-pointer appearance-none rounded-full border border-main-text text-primary transition-all before:absolute before:left-2/4 before:top-2/4 before:block before:h-12 before:w-12 before:-translate-x-2/4 before:-translate-y-2/4 before:rounded-full before:opacity-0 before:transition-opacity checked:border-primary checked:before:bg-primary hover:before:opacity-0" />
    <label class="capitalize">{{$text}}</label>
</div>