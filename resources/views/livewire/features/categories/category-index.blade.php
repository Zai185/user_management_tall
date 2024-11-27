<div x-data="{modalOpen : false, category_id: null, category_name :''}"
    class="relative  w-full h-full overflow-y-auto  text-gray-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
    <h2 class="text-2xl font-medium">Categories</h2>
    <p class="text-lg">Category List</p>

    @if (auth('web')->user()->hasPermission("categories", 'create'))
    <a href="{{route('categories.create')}}" wire:navigate class="py-1 px-4 border rounded bg-blue-700 hover:bg-blue-900 ml-auto text-white block w-fit cursor-pointer">
        Create Category
    </a>
    @endif

    @if($categories)
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
                            Category Path
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Actions</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{(($categories->currentPage() - 1) * 10) + $index + 1}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$category->name}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">

                            {{$category->parent_path}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50 w-48">
                        @if (auth('web')->user()->hasPermission("categories", 'edit' ))
                        <a href="{{route('categories.edit', ['category'=> $category->id])}}"
                            wire:navigate class="inline-block mx-2 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                        @endif
                        @if (auth('web')->user()->hasPermission("categories", 'delete' ))
                        <button @click="modalOpen = true;category_id='{{$category->id}}'; category_name=`{{$category->name}}`"
                            class="btn_category_delete inline-block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Delete
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full mt-4">
            {{$categories->onEachSide(1)->links()}}
        </div>
    </div>
    @else

    {{json_encode($categories)}}
    <h2 class="text-3xl text-center">No category yet!</h2>
    @endif
    <x-modal feature="category" />
</div>