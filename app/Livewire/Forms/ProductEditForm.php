<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Models\ProductMedia;
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
    public $images;
    public $images_mirror;
    public $new_images;

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
        if ($product->product_media->count()) {
            $this->images = $product->product_media->map(function ($pm) {
                $this->images_mirror[] = asset('storage/' . $pm->img_path);
                $pm['img_path'] = asset('storage/' . $pm->img_path);
                return $pm;
            });
        }
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
            "new_images" => "nullable|array",
            "new_images.*" => "nullable|image|max:5120"
        ];
    }
    public function submit(Product $product)
    {
       

        $productData = $this->validate($this->rules($product));
        foreach ($productData as $key => $value) {
            $product[$key] = $value;
        }

        foreach ($this->images ?? [] as $i) {
            if (!in_array($i, $this->images_mirror)) {
            }
        }

        if ($this->new_images) {

            foreach ($this->new_images as $image) {
                $mime = $image->getClientOriginalExtension();
                $path = $image->storeAs('products', uniqid('products') . '.' . $mime, 'public');
                ProductMedia::create([
                    'product_id' => $product->id,
                    'img_path' => $path
                ]);
            }
        }

        unset($product['new_images']);
        $product->save();

        session()->flash('success', 'Product Created Successfully');
    }
}
