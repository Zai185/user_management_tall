<?php

namespace App\Livewire\Features\Units;

use App\Livewire\Forms\UnitEditForm;
use App\Models\Unit;
use Livewire\Component;

class UnitEdit extends Component
{
    
    public Unit $unit;
    public UnitEditForm $form;

    public function mount(Unit $unit){
        $this->unit = $unit;
        $this->form->mount($unit);
    }

    public function save(){
        $this->form->submit($this->unit);
        $this->redirectRoute("units.index", navigate:true);
    }

    public function render()
    {
        return view('livewire.features.units.unit-edit');
    }
}
