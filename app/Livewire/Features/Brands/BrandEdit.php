<?php

namespace App\Livewire\Features\Brands;

use App\Livewire\Forms\BrandEditForm;
use App\Models\Brand;
use Livewire\Component;

class BrandEdit extends Component
{
    
    public Brand $brand;
    public BrandEditForm $form;

    public function mount(Brand $brand){
        $this->brand = $brand;
        $this->form->mount($brand);
    }

    public function save(){
        $this->form->submit($this->brand);
        $this->redirectRoute("brands.index", navigate:true);
    }

    public function render()
    {
        return view('livewire.features.brands.brand-edit');
    }
}
