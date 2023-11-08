<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $open = false;

    public $name,$icon,$order;

    protected $rules = [
        "name" => "required|max:25|min:3",
        "icon" => "required"
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();

        $this->order = 1;

        Category::create([
            'name'=>$this->name,
            'icon'=>$this->icon,
            'order'=>$this->order
        ]);

        $this->reset(['open','name','icon','order']);
        $this->dispatch('render');
        $this->dispatch('alert','Category added successfully!!');
    }

    public function render()
    {
        return view('livewire.create-category');
    }

    public function delete()
    {
        
    }
}
