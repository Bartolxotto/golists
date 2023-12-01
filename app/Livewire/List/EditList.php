<?php

namespace App\Livewire\List;

use App\Livewire\Forms\ListForm;
use App\Models\AppList;
use Livewire\Component;

class EditList extends Component
{
    public $open = false;
    public AppList $list;
    public ListForm $form;

    public function mount(AppList $list)
    {
        $this->list = $list;
        $this->form->name = $list->name;
        $this->form->description = $list->description;
        $this->form->image = $list->image;
    }

    public function save()
    {

        $this->form->validate();

        
        $this->list->name = $this->form->name;
        $this->list->description = $this->form->description;
        $this->list->image = $this->form->image;
        $this->list->save();

        $this->reset(['open']);
        //$this->dispatch('render');
        //$this->dispatch('alert', 'List updated successfully!!');     
        $this->js('window.location.reload()');
    }

    public function delete()
    {
        $this->list->delete();
        $this->redirect('/lists');
    }


    public function render()
    {
        return view('livewire.list.edit-list');
    }
}
