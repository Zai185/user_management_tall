<?php

namespace App\Livewire\Forms;

use App\Models\Brand;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BrandCreateForm extends Form
{
    
    #[Validate("required|string")]
    public $name;
    public function submit()
    {
        $data = $this->validate();
        Brand::create($data);
        session()->flash('success', 'Brand Created Successfully');
    }
}
