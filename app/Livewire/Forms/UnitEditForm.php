<?php

namespace App\Livewire\Forms;

use App\Models\Unit;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UnitEditForm extends Form
{

    public $id;
    #[Validate("required" )]
    public $name;
    public function mount(Unit $unit)
    {
        $this->id = $unit->id;
        $this->name = $unit->name;
    }

    public function submit(Unit $unit)
    {
        $data = $this->validate();
        foreach ($data as $key => $value) {
            $unit[$key] = $value;
        }
        $unit->save();
        session()->flash('success', 'Unit Created Successfully');
    }
}
