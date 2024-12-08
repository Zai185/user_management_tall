<?php

namespace App\Livewire\Features\Products;

use App\Livewire\Forms\ProductEditForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{

    use WithFileUploads;
    public Product $product;
    public ProductEditForm $form;

    public function deleteImage($index)
    {
        unset($this->form->images[$index]);
    }
    public function deleteNewImage($index)
    {
        unset($this->form->new_images[$index]);
    }
    public function mount(Product $product)
    {
        $this->product = $product;
    }


    public function save()
    {
        if ((count($this->form->images ?? []) + count($this->form->new_images ?? [])) > 3) {
            $this->addError('max-images', "Only 3 images is allowed.");
            return;
        }
        $this->form->submit($this->product);
        $this->redirectRoute("products.index", navigate: true);
    }
    public function render()
    {

        $this->form->mount($this->product);

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
