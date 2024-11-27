<?php

namespace App\Livewire\Features\Categories;

use App\Livewire\Forms\CategoryCreateForm;
use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{

    public CategoryCreateForm $form;
    public function create(){
        $this->form->submit();
        $this->redirectRoute("categories.index", navigate:true);
    }
    public function render()
    {
        return view('livewire.features.categories.category-create',
        [
            "categories" => Category::all()
        ]
    );
    }
}
