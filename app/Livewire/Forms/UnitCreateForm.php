<?php

namespace App\Livewire\Forms;

use App\Models\Unit;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UnitCreateForm extends Form
{
    
    public $name;
    public function submit()
    {
        $data = $this->validate();
        Unit::create($data);
        session()->flash('success', 'Unit Created Successfully');
    }
}
