<?php

namespace App\Livewire\Forms;

use App\Models\Brand;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BrandCreateForm extends Form
{
    
    #[Validate("required|string")]
    public $name;
    #[Validate("required|string")]
    public $made_in;

    public function submit()
    {
        $data = $this->validate();
        Brand::create($data);
        session()->flash('success', 'Brand Created Successfully');
    }
}
