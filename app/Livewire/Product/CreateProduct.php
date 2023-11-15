<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $open = false;
    public $categories;

    public ProductForm $form;

    public function mount()
    {
        $this -> categories = Category::all();
    }

    public function save(){

        $this->form->validate();

        Product::create(
            $this->form->all()
        );

        $this->reset(['open']);
        $this->form->reset();

        $this->dispatch('render');
        $this->dispatch('alert','Category added successfully!!');
    }


    public function render()
    {
        return view('livewire.product.create-product');
    }
}
