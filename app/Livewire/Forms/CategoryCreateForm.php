<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryCreateForm extends Form
{
    #[Validate("required|string")]
    public $name;
    #[Validate("nullable|exists:categories,id")]
    public $category_id;
    public function submit()
    {
        $data = $this->validate();
        Category::create($data);
        session()->flash('success', 'Category Created Successfully');
    }
}
