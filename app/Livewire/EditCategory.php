<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class EditCategory extends Component
{

    public $open = false;
    public $category;
    public $name,$icon;

    protected $rules = [
        "category.name" => "required|max:25|min:3",
        "category.icon" => "required"
    ];

    public function mount(Category $category){
        $this->category = $category;
        $this->name = $category->name;
        $this->icon = $category->icon;
    }

    public function save(){

        $this->validate();

        $this->category->name = $this->name;
        $this->category->icon = $this->icon;

        $this->category->save();

        $this->reset(['open']);
        $this->dispatch('render');
        $this->dispatch('alert','Category updated successfully!!');


    }


    public function render()
    {
        return view('livewire.edit-category');
    }
}
