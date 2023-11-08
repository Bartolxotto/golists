<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ShowCategories extends Component
{
    public $categories;

    protected $listeners = ["render"=>"render"];

    public function render()
    {
        $this->categories = Category::orderBy('order')->get();
        return view('livewire.show-categories');
    }
}
