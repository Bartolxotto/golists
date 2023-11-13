<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;

class ShowCategories extends Component
{
    public $categories, $search = '';

    public CategoryForm $form;

    protected $listeners = ["render"=>"render"];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function delete(Category $category){
        $category->delete();
        $this->dispatch('alert','Category deleted successfully!!');
    }

    public function render()
    {
        $this->categories = Category::orderBy('order')->where("name","like","%".$this->search."%")->get();
        return view('livewire.show-categories');
    }
}
