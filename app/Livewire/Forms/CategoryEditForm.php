<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Rules\NotSameCategoryType;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryEditForm extends Form
{

    public $id;
    #[Validate("required")]
    public $name;
    #[Validate("nullable|exists:categories,id")]
    public $category_id;
    public function rules()
    {
        return [

            'name' => 'required',
            'category_id' => ['nulable', 'exists:categories,id', new NotSameCategoryType($this->id)]
        ];
    }
    public function mount(Category $category)
    {
        $this->id = $category->id;
        $this->name = $category->name;
        $this->category_id = $category->category_id;
    }

    public function submit(Category $category)
    {
        $data = $this->validate();
        foreach ($data as $key => $value) {
            $category[$key] = $value;
        }

        if (!$this->category_id) $category['category_id'] = null;

        $category->save();
        session()->flash('success', 'Category Created Successfully');
    }
}
