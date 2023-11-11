<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CategoryForm extends Form
{
    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $icon;

    public $order = 1;

}
