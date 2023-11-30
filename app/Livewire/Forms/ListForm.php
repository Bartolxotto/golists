<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ListForm extends Form
{
    #[Rule('required')]
    public $name;

    public $description = "";
    
    public $image = "url";
}
