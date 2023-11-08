<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class DeleteCategory extends Component
{

    public $category;

    protected $rules = [
        "category.name" => "required|max:25|min:3",
        "category.icon" => "required"
    ];

    public function mount(Category $category){
        $this->category = $category;      
    }

    public function delete(){

        $this->category->delete();

        $this->dispatch('render');
        $this->dispatch('alert','Category deleted successfully!!');


    }

    public function render()
    {
        return view('livewire.delete-category');
    }
}
