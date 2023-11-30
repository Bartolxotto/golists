<?php

namespace App\Livewire\List;

use Livewire\Component;

class ShowItems extends Component
{
    public $list;
        
    public function render()
    {
        return view('livewire.list.show-items');
    }
}
