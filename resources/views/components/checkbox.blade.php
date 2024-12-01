<input
    type="checkbox"
    {{$attributes->merge(['class'=>"before:content[''] peer relative h-4 w-4 cursor-pointer appearance-none rounded-[4px] border border-main-text transition-all checked:border-primary checked:bg-primary"])}}
    value="{{$value ?? ''}}" />