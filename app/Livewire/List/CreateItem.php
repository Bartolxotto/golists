<?php

namespace App\Livewire\List;

use Livewire\Component;
use App\Livewire\Forms\ItemForm;
use App\Models\Product;
use App\Models\Item;
use App\Models\AppList;
use App\Models\Config;

class CreateItem extends Component
{
    public AppList $list;
    public $search = "";

    public function addExistingProduct($productId){

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

    public function addNewProduct()
    {
        $defaultCategory = 0;

        $config = Config::where('param', 'DEFAULT_CATEGORY')->first();
        if ($config)
            $defaultCategory = $config->value;        

        $product = Product::create([
            'name' => $this->search,
            'url' => NULL,
            'category_id' => $defaultCategory
        ]);

        Item::create([
            'quantity' => 1,
            'checked' => false,
            'list_id' => $this->list->id,
            'product_id' => $product->id
        ]);

        $this->reset("search");
        $this->dispatch('render');
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
