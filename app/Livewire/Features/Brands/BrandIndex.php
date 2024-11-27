<?php

namespace App\Livewire\Features\Brands;

use App\Models\Brand;
use Livewire\Component;

class BrandIndex extends Component
{
    public function delete($brand_id)
    {
        Brand::findOrFail($brand_id)->delete();
    }
    public function render()
    {
        return view(
            'livewire.features.brands.brand-index',
            [
                'brands' => Brand::paginate(10)
            ]
        );
    }
}
