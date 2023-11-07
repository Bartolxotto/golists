<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;

class ShowList extends Component
{
    public $items;
    public $addItem = "Add item";
    
    public function render()
    {
        $this->items = Item::where('list_id',1)->orderBy('updated_at')->get();
        return view('livewire.show-list');
    }
}
