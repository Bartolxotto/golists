<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductForm extends Form
{
    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $category_id;
    
    public $image = "url";
}
