<div x-data="{modalOpen : false, role_id: null, role_name :''}"
    class="relative  w-full h-full overflow-y-auto  text-gray-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
    <h2 class="text-2xl font-medium">Roles</h2>
    <p class="text-lg">Role List</p>

    @if (auth('web')->user()->hasPermission($feature->id, 'create'))

    <a href="{{route('roles.create')}}" wire:navigate class="py-1 px-4 border rounded bg-blue-700 hover:bg-blue-900 ml-auto text-white block w-fit cursor-pointer">
        Create Role
    </a>

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
            <tr>
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
                    @if (auth('web')->user()->hasPermission($feature->id, 'edit' ))
                    <a href="{{route('roles.edit', ['role'=> $role->id])}}" wire:navigate class="inline-block mx-2 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                        Edit
                    </a>
                    @endif
                    @if (auth('web')->user()->hasPermission($feature->id, 'delete' ))
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