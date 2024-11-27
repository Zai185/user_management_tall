<aside left class="relative w-64 h-screen bg-gray-800 p-2">

    <h2 class="text-2xl text-white font-bold mb-2">Picosbs</h2>
    <a href="{{route('dashboard')}}" wire:navigate class="w-full flex justify-between border-b items-center py-2 text-white px-2 bg-gray-700">
        <span class="capitalize">Dashboard</span>
    </a>

    <x-accordion feature="users" />
    <x-accordion feature="roles" />
    <x-accordion feature="products">
        <x-accordion feature="categories" />
        <x-accordion feature="brands" />
        <x-accordion feature="units" />
    </x-accordion>

    <button wire:click="logout" class="absolute left-0 bottom-0 w-full py-2 text-white bg-gray-700 hover:bg-gray-900 transition">Logout</button>
</aside>