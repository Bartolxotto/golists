<?php

namespace App\Livewire\List;

use Livewire\Component;
use App\Livewire\Forms\ItemForm;
use App\Models\Product;
use App\Models\Item;
use App\Models\AppList;

class CreateItem extends Component
{
    public AppList $list;
    public $search = "";

    public function save($productId){

        $item = array(
            'quantity' => 1,
            'checked' => false,
            'list_id' => $this->list->id,
            'product_id' => $productId,
        );

        Item::create($item);
        $this->reset("search");
        $this->dispatch('render');
        //$this->dispatch('alert','List created successfully!!');
    }

    public function render()
    {
        $products = [];

        if (strlen($this->search) > 2) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.list.create-item', ['products' => $products]);
    }
}
