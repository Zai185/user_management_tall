<?php

namespace App\Livewire\Features\Products;

use App\Http\Resources\ProductResource;
use App\Models\Feature;
use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{

    public function delete($product_id)
    {
        Product::findOrFail($product_id)->delete();
    }
    public function render()
    {

        $products = Product::paginate(10);
        $feature = Feature::where('name', 'products')->first();

        return view(
            'livewire.features.products.product-index',
            [
                'products' => $products,
                'feature' => $feature
            ]
        );
    }
}
