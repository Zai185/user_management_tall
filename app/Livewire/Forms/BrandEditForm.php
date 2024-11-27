<?php

namespace App\Livewire\Forms;

use App\Models\Brand;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BrandEditForm extends Form
{

    public $id;
    #[Validate("required" )]
    public $name;
    public function mount(Brand $brand)
    {
        $this->id = $brand->id;
        $this->name = $brand->name;
    }

    public function submit(Brand $brand)
    {
        $data = $this->validate();
        foreach ($data as $key => $value) {
            $brand[$key] = $value;
        }
        $brand->save();
        session()->flash('success', 'Brand Created Successfully');
    }
}
