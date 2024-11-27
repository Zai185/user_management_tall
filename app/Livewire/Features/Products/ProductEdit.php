<?php

namespace App\Livewire\Features\Products;

use App\Livewire\Forms\ProductEditForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Livewire\Component;

class ProductEdit extends Component
{

    public Product $product;
    public ProductEditForm $form;

    public function mount(Product $product){
        $this->product = $product;
        $this->form->mount($product);
    }

    public function save(){
        $this->form->submit($this->product);
        $this->redirectRoute("products.index", navigate:true);
    }
    public function render()
    {
        return view(
            'livewire.features.products.product-edit',
            [
                'brands' => Brand::all(),
                'categories' => Category::all(),
                'units' => Unit::all()
            ]
        );
    }
}
