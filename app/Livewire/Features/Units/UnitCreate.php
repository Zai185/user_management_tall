<?php

namespace App\Livewire\Features\Units;

use App\Livewire\Forms\UnitCreateForm;
use App\Models\Unit;
use Livewire\Component;

class UnitCreate extends Component
{

    public UnitCreateForm $form;
    public function create(){
        $this->form->submit();
        $this->redirectRoute("units.index", navigate:true);
    }
    public function render()
    {
        return view('livewire.features.units.unit-create',
    );
    }
}
