<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class ShowProduct extends Component
{
    public $products;

    public ProductForm $form;

    protected $listeners = ["render"=>"render"];

    public function mount()
    {
        $this->products = Product::all();
    }
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product.show-product');
    }
}
