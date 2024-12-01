@error($error)
<p {{$attributes->class(['text-sm text-red-700']) }}>
    {{ $message}}
</p>
@enderror