<?php

namespace App\Livewire\Features\Units;

use App\Models\Unit;
use Livewire\Component;

class UnitIndex extends Component
{
    public function delete($unit_id)
    {
        Unit::findOrFail($unit_id)->delete();
    }
    public function render()
    {
        return view(
            'livewire.features.units.unit-index',
            [
                'units' => Unit::paginate(10)
            ]
        );
    }
}
