<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css'])
    @livewireStyles
    @vite(['resources/js/app.js'])
</head>

<body>

    <div class="flex ">
        <livewire:components.sidebar />
        <div class="flex-1 h-screen overflow-y-auto">
            {{$slot}}
        </div>
    </div>
    @livewireScripts
</body>

</html>