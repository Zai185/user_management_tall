<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Models\ProductMedia;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Form;

class ProductCreateForm extends Form
{
    use WithFileUploads;
    public $name = '';
    public $description = '';
    public $SKU = '';
    public $sale_price;
    public $purchased_price;
    public $category_id = '';
    public $brand_id = '';
    public $unit_id = '';
    public $is_active;
    public $images = [];

    public function rules()
    {
        return [
            "name" => "required|string",
            "description" => "required|string",
            "SKU" => "required|min:8|max:12|unique:products,SKU",
            "sale_price" => "required|integer",
            "purchased_price" => "required|integer",
            "category_id" => "required",
            "brand_id" => "required",
            "unit_id" => "required",
            "is_active" => "nullable",
            "images" => "nullable|array|max:3",
            "images.*" => "nullable|image|max:5120"
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        $data['is_active'] = $data['is_active'] == 1;
        $product = Product::create($data);
        if ($this->images) {
            foreach ($this->images as $image) {
                $mime = $image->getClientOriginalExtension();
                $path = $image->storeAs('products', uniqid('products') . '.' . $mime, 'public');
                ProductMedia::create([
                    'product_id' => $product->id,
                    'img_path' => $path
                ]);
            }
        }
        session()->flash('success', 'Product Created Successfully');
    }
}
