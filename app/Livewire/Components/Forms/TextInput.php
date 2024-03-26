<?php

namespace App\Livewire\Components\Forms;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TextInput extends Component
{
    #[Modelable]
    public $value = '';

    public $type = 'text';

    public $id;

    public $placeholder;

    public $required;

    public function mount($required = null)
    {
        $this->required = $this->required ? 'required' : '';
    }

    public function render()
    {
        return view('livewire.components.forms.text-input');
    }
}
