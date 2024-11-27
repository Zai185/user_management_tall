<?php

namespace App\Livewire\Features\Categories;

use App\Livewire\Forms\CategoryEditForm;
use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    
    public Category $category;
    public CategoryEditForm $form;

    public function mount(Category $category){
        $this->category = $category;
        $this->form->mount($category);
    }

    public function save(){
        $this->form->submit($this->category);
        $this->redirectRoute("categories.index", navigate:true);
    }

    public function render()
    {
        
        return view('livewire.features.categories.category-edit',[
            'categories' => Category::all()
        ]);
    }
}
