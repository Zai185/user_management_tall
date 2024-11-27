<?php

namespace App\Livewire\Features\Brands;

use App\Livewire\Forms\BrandCreateForm;
use App\Models\Brand;
use Livewire\Component;

class BrandCreate extends Component
{

    public BrandCreateForm $form;
    public function create(){
        $this->form->submit();
        $this->redirectRoute("brands.index", navigate:true);
    }
    public function render()
    {
        return view('livewire.features.brands.brand-create',
    );
    }
}
