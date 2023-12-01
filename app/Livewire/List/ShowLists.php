<?php

namespace App\Livewire\List;

use App\Models\AppList;
use Livewire\Component;

class ShowLists extends Component
{
    public $lists;

    #[Url]
    public $listId = '';
    public $selectedList;

    protected $listeners = ["render" => "render"];

    public function mount()
    {
        $this->lists = AppList::all();
        if ($this->listId == '')
            $this->listId = $this->lists[0]->id;
        
        $this->selectedList = $this->lists->find($this->listId);
    }

    public function render()
    {
        $this->lists = AppList::all();
        return view('livewire.list.show-lists');
    }
}
