<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShowProduct extends Component
{
    public $categories, $search = '';

    public ProductForm $form;

    protected $listeners = ["render" => "render", "refresh" => "render"];

    public function delete(Product $product)
    {
        $product->delete();
        $this->dispatch('alert', 'Product deleted successfully!!');
    }

    public function render()
    {
        $this->categories = Category::has('products')
            ->with(['products', 'products.productAliases'])
            ->whereHas('products', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('order')
            ->get();
        return view('livewire.product.show-product');
    }
}
