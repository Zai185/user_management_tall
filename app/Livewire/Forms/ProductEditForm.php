<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductEditForm extends Form
{
    public $id;
    public $name = '';
    public $description = '';
    public $SKU = '';
    public $sale_price;
    public $purchased_price;
    public $category_id;
    public $brand_id;
    public $unit_id;
    public $is_active;

    public function mount(Product $product)
    {
        $this->id = $product->id;
        $this->name  = $product->name;
        $this->description  = $product->description;
        $this->SKU  = $product->SKU;
        $this->sale_price = $product->sale_price;
        $this->purchased_price = $product->purchased_price;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->unit_id = $product->unit_id;
        $this->is_active = $product->is_active;
    }
    public function rules(Product $product)
    {
        return [
            "name" => "required|string",
            "description" => "required|string",
            "SKU" => "required|min:8|max:12|unique:products,SKU," . $product->id,
            "sale_price" => "required|integer",
            "purchased_price" => "required|integer",
            "category_id" => "required",
            "brand_id" => "required",
            "unit_id" => "required",
            "is_active" => "nullable",
        ];
    }
    public function submit(Product $product)
    {
        $productData = $this->validate($this->rules($product));
        foreach ($productData as $key => $value) {
            $product[$key] = $value;
        }
        $product->save();

        session()->flash('success', 'Product Created Successfully');
    }
}
