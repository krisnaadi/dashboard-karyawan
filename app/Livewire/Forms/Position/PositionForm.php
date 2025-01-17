<?php

namespace App\Livewire\Forms\Position;

use App\Models\Position;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PositionForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $name = '';
    #[Locked]
    public $id = null;

    public function setUnit($position) {
        $this->name = $position->name;
        $this->id = $position->id;
    }

    public function store() 
    {
        $this->validate();
        Position::create([
            'name' => $this->name
        ]);
        $this->reset();
    }

    public function update() 
    {
        $this->validate();
        Position::find($this->id)->update([
            'name' => $this->name
        ]);
        $this->reset();
    }
}
