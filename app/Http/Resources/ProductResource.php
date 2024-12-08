<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'description' => $this->description,
            // 'SKU' => $this->SKU,
            // 'sale_price' => $this->sale_price,
            // 'purchased_price' => $this->purchased_price,
            // 'category_id' => $this->category_id,
            // 'brand_id' => $this->brand_id,
            'unit_id' => $this->unit_id,
            'is_active' => $this->is_active,
            'images' => $this->product_media->map(function ($pm) {
                $pm['img_path'] = asset('storage/' . $pm->img_path);
                return $pm;
            })
        ];
    }
}
