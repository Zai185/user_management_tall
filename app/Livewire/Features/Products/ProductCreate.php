<?php

namespace App\Livewire\Features\Products;

use App\Livewire\Forms\ProductCreateForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Role;
use App\Models\Unit;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductCreate extends Component
{

    use WithFileUploads;
    public ProductCreateForm $form;
    public function create()
    {
        $this->form->submit();
        $this->redirectRoute('products.index', navigate: true);
    }

    public function deleteImage($index)
    {
        unset($this->form->images[$index]);
    }

    public function render()
    {

        return view(
            'livewire.features.products.product-create',
            [
                'brands' => Brand::all(),
                'categories' => Category::all(),
                'units' => Unit::all()
            ]
        );
    }
}
