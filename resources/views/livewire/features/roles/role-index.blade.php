<div x-data="{modalOpen : false, role_id: null, role_name :''}"
    class="relative  w-full h-full overflow-y-auto  text-gray-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
    <h4>Role List</h4>

    @if (auth('web')->user()->hasPermission("roles", 'create'))

    <x-button-link href="{{route('roles.create')}}">
        Create Role
    </x-button-link>
    @endif

    @if($roles->count())

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
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Actions</p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $index => $role)
            <tr id="role-{{ $role->id }}">
                <td class="p-4 border-b border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{(($roles->currentPage() - 1) * 10) + $index + 1}}
                    </p>
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{$role->name}}

                    </p>
                </td>
                <td class="p-4 border-b border-blue-gray-50 w-48">
                    @if (auth('web')->user()->hasPermission("roles", 'edit' ))
                    <a wire:navigate href="{{route('roles.edit', ['role'=> $role->id])}}" class="inline-block mx-2 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                        Edit
                    </a>
                    @endif
                    @if (auth('web')->user()->hasPermission("roles", 'delete' ))
                    <button @click="modalOpen = true;role_id='{{$role->id}}'; role_name=`{{$role->name}}`"
                        class="btn_role_delete inline-block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                        Delete
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="w-full mt-4">
        {{$roles->onEachSide(1)->links()}}
    </div>

    <x-modal feature="role" />
    @else
    <h2 class="text-3xl text-center">No role yet!</h2>
    @endif
</div>