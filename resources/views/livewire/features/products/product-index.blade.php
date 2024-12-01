<div x-data="{modalOpen : false, product_id: null, product_name :''}"
    class="relative  w-full h-full overflow-y-auto  text-gray-700 bg-white shadow-md rounded-xl bg-clip-border p-4">
    <h2 class="text-2xl font-medium">Products</h2>
    <p class="text-lg">Product List</p>

    @if (auth('web')->user()->hasPermission("products", 'create'))
    <x-button-link href="{{route('products.create')}}" >
        Create Product
    </x-button-link>
    @endif
    @if($products->count())
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
                            Purchased Price
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Sale Price
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Category
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Brand
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">Actions</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{(($products->currentPage() - 1) * 10) + $index + 1}}
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->name}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->purchased_price}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->sale_price}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->category->name}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{$product->brand->name}}

                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50 w-48">
                        @if (auth('web')->user()->hasPermission("products", 'edit' ))
                        <a href="{{route('products.edit', ['product'=> $product->id])}}"
                             class="inline-block mx-2 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                        @endif
                        @if (auth('web')->user()->hasPermission("products", 'delete' ))
                        <button @click="modalOpen = true;product_id='{{$product->id}}'; product_name=`{{$product->name}}`"
                            class="btn_product_delete inline-block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Delete
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full mt-4">
            {{$products->onEachSide(1)->links()}}
        </div>
    </div>
    @else
    <h2 class="text-3xl text-center">No product yet!</h2>
    @endif
    <x-modal feature="product" />
</div>