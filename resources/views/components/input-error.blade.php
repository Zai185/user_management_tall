@props(['message'])

@if($message)
<p {{$attributes->class(['text-sm text-red-700']) }}>
    {{ $message}}
</p>
@endif