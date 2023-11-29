<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAlias;
use Livewire\Component;

class EditProduct extends Component
{
    public $openEdit = false;
    public $categories;
    public $aliasInput, $aliasProduct;
    public $productId;
    public ProductForm $form;

    public function mount(Product $product)
    {
        $this->categories = Category::all();
        $this->aliasProduct = $product->productAliases;
        $this->productId = $product->id;
        $this->form->name = $product->name;
        $this->form->image = $product->image;
        $this->form->category_id = $product->category_id;
    }

    public function save()
    {

        $this->form->validate();

        $product = Product::find($this->productId);
        $product->name = $this->form->name;
        $product->image = $this->form->image;
        $product->category_id = $this->form->category_id;
        $product->save();

        $this->reset(['openEdit']);
        //$this->dispatch('render');
        //$this->dispatch('alert', 'Product updated successfully!!');     
        $this->js('window.location.reload()');
    }

    public function addAlias()
    {
        $alias = new ProductAlias;
        $alias->name = $this->aliasInput;
        $alias->product_id = $this->productId;
        $alias->save();
        $this->aliasProduct[] = $alias;
        $this->reset(['aliasInput']);
    }

    public function deleteAlias($id)
    {
        $alias = ProductAlias::find($id);
        $alias->delete();
        $this->aliasProduct = $this->aliasProduct->except($id);
    }

    public function render()
    {
        return view('livewire.product.edit-product');
    }
}
