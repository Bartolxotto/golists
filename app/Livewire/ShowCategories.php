<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;
use App\Models\Config;

class ShowCategories extends Component
{
    public $categories, $defaultCategory, $search = '';

    public CategoryForm $form;

    protected $listeners = ["render"=>"render"];

    public function mount()
    {
        $this->categories = Category::all();

        $config = Config::where('param', 'DEFAULT_CATEGORY')->first();
        if ($config)
            $this->defaultCategory = $config->value;
    }

    public function delete(Category $category){
        $category->delete();
        $this->dispatch('alert','Category deleted successfully!!');
    }

    public function render()
    {
        $this->categories = Category::orderBy('order')->where("name","LIKE","%".$this->search."%")->get();
        return view('livewire.category.show-categories');
    }
}
