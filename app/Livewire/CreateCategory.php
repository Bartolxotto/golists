<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $open = false;

    public CategoryForm $form;

    public function save(){

        $this->form->validate();

        Category::create(
            $this->form->all()
        );

        $this->reset(['open']);
        $this->form->reset();

        $this->dispatch('render');
        $this->dispatch('alert','Category added successfully!!');
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
