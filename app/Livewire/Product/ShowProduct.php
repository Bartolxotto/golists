<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShowProduct extends Component
{
    public $categories;

    public ProductForm $form;

    protected $listeners = ["render"=>"render", "refresh"=>"render"];

    public function mount()
    {
        $this->categories = Category::has('products')->with('products')->get();
    }
    public function delete(Product $product){
        $product->delete();
        $this->dispatch('alert','Product deleted successfully!!');
    }

    public function render()
    {
        $this->categories = Category::has('products')->with('products')->get();
        return view('livewire.product.show-product');
    }
}
