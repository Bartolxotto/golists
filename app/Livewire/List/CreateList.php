<?php

namespace App\Livewire\List;

use App\Livewire\Forms\ListForm;
use App\Models\AppList;
use Livewire\Component;

class CreateList extends Component
{
    public $open = false;

    public ListForm $form;

    public function save(){

        $this->form->validate();

        $createdList = AppList::create(
            $this->form->all()
        );

        $this->reset(['open']);
        $this->form->reset();

        //$this->dispatch('render');
        //$this->dispatch('alert','List created successfully!!');
        $this->redirect('/lists/'.$createdList->id);
    }

    public function render()
    {
        return view('livewire.list.create-list');
    }
}
