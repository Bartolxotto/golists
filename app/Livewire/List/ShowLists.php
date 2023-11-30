<?php

namespace App\Livewire\List;

use App\Models\AppList;
use App\Models\AppLists;
use Livewire\Component;

class ShowLists extends Component
{
    public $lists;

    #[React]
    public $selectedList;

    protected $listeners = ["render" => "render"];

    public function mount()
    {
        $this->lists = AppList::all();
        $this->selectedList = $this->lists[0];
    }
    public function render()
    {
        $this->lists = AppList::all();
        return view('livewire.list.show-lists');
    }
}
