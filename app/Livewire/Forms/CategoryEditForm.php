<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryEditForm extends Form
{

    public $id;
    #[Validate("required" )]
    public $name;
    #[Validate("nullable|exists:categories,id" )]
    public $category_id;
    public function mount(Category $category)
    {
        $this->id = $category->id;
        $this->name = $category->name;
    }

    public function submit(Category $category)
    {
        $data = $this->validate();
        foreach ($data as $key => $value) {
            $category[$key] = $value;
        }
        $category->save();
        session()->flash('success', 'Category Created Successfully');
    }
}
