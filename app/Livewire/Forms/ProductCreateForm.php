<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductCreateForm extends Form
{
    public $name = '';
    public $description = '';
    public $SKU = '';
    public $sale_price;
    public $purchased_price;
    public $category_id;
    public $brand_id;
    public $unit_id;
    public $is_active;

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
        ];
    }
    public function submit()
    {
        $product = $this->validate();
        Product::create($product);
        session()->flash('success', 'Product Created Successfully');
    }
}
