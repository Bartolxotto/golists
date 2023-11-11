<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class ShowCategories extends Component
{
    public $categories;

    protected $listeners = ["render"=>"render"];

    public function delete(Category $category){
        $category->delete();
        $this->dispatch('alert','Category deleted successfully!!');
    }

    public function render()
    {
        $this->categories = Category::orderBy('order')->get();
        return view('livewire.show-categories');
    }
}
