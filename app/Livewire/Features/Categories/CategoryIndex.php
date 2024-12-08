<?php

namespace App\Livewire\Features\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;
    public function delete($category_id)
    {
        Category::findOrFail($category_id)->delete();
        // if(Category::count() <= 0) $this->resetPage();
    }
    public function render()
    {
        
        $categories = Category::paginate(10);
        $this->resetPage();
        return view(
            'livewire.features.categories.category-index',
            [
                'categories' => $categories
            ]
        );
    }
}
