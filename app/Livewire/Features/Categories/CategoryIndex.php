<?php

namespace App\Livewire\Features\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{

    public function render()
    {
        $categories = Category::paginate(10);

        return view(
            'livewire.features.categories.category-index',
            [
                'categories' => $categories
            ]
        );
    }
}
