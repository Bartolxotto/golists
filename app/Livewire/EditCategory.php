<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;

class EditCategory extends Component
{

    public $openEdit = false;
    public $categoryId;    
    public CategoryForm $form;

    public function mount(Category $category){

        $this->categoryId = $category->id;
        $this->form->name = $category->name;
        $this->form->icon = $category->icon;

    }

    public function save(){

        $this->form->validate();

        $category = Category::find($this->categoryId);
        $category->name = $this->form->name;
        $category->icon = $this->form->icon;
        $category->save();
        
        $this->reset(['openEdit']);
        $this->dispatch('render');
        $this->dispatch('alert','Category updated successfully!!');


    }


    public function render()
    {
        return view('livewire.edit-category');
    }
}
