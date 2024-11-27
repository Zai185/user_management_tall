<div x-data="{modalOpen : false, user_id: null, user_name :''}"
    class="relative  w-full h-full overflow-y-auto  text-gray-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
    <h2 class="text-2xl font-medium">Users</h2>
    <p class="text-lg">User List</p>

    @if (auth('web')->user()->hasPermission("units", 'create'))
    <a href="{{route('users.create')}}" wire:navigate class="py-1 px-4 border rounded bg-blue-700 hover:bg-blue-900 ml-auto text-white block w-fit cursor-pointer">
        Create User
    </a>
    @endif
    @if($users->count())
    <div>
        <table class="border border-gray-400 shadow-lg w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            No.
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Name
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Email
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Actions</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{(($users->currentPage() - 1) * 10) + $index + 1}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$user->name}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$user->email}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50 w-48">
                        @if (auth('web')->user()->hasPermission("units", 'edit' ))
                        <a href="{{route('users.edit', ['user'=> $user->id])}}"
                            wire:navigate class="inline-block mx-2 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                        @endif
                        @if (auth('web')->user()->hasPermission("units", 'delete' ))
                        <button @click="modalOpen = true;user_id='{{$user->id}}'; user_name=`{{$user->name}}`"
                            class="btn_user_delete inline-block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Delete
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full mt-4">
            {{$users->onEachSide(1)->links()}}
        </div>
    </div>
    @else
    <h2 class="text-3xl text-center">No user yet!</h2>
    @endif
    <x-modal feature="user" />
</div>