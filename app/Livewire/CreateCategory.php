<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $open = false;

    public CategoryForm $form;

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        Category::create([
            'name'=>$this->form->name,
            'icon'=>$this->form->icon,
            'order'=>$this->form->order
        ]);

        $this->reset(['open','name','icon','order']);
        $this->dispatch('render');
        $this->dispatch('alert','Category added successfully!!');
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
