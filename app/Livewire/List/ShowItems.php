<?php

namespace App\Livewire\List;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class ShowItems extends Component
{
    public $list;
    public $items = array();

    protected $listeners = ["render" => "render"];

    public function mount()
    {
        $this->items = DB::table('items')
            ->join('products', 'items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('items.*', 'categories.name as category_name', 'categories.icon as category_icon', 'products.name as product_name')
            ->where('items.list_id', $this->list->id)
            ->orderBy('categories.order')
            ->get();
    }

    public function addQuantity($itemId)
    {
        $item = Item::find($itemId);
        $item->quantity++;
        $item->save();
    }

    public function subtractQuantity($itemId)
    {
        $item = Item::find($itemId);
        $item->quantity--;
        $item->save();
    }

    public function checked($itemId)
    {
        $item = Item::find($itemId);
        $item->checked = !$item->checked;
        if($item->checked)
            $item->checked_at = now();
        else
            $item->checked_at = null;
            
        $item->save();
    }

    public function delete($itemId)
    {
        $item = Item::find($itemId);
        $item->delete();
    }

    public function render()
    {
        $this->items = DB::table('items')
            ->join('products', 'items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('items.*', 'categories.name as category_name', 'categories.icon as category_icon', 'products.name as product_name')
            ->where('items.list_id', $this->list->id)
            ->orderBy('categories.order')
            ->get();
        return view('livewire.list.show-items');
    }
}
