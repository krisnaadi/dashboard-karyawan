<?php

namespace App\Livewire\Forms\Unit;

use App\Models\Unit;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UnitForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $name = '';
    #[Locked]
    public $id = null;

    public function setUnit($unit) {
        $this->name = $unit->name;
        $this->id = $unit->id;
    }

    public function store() 
    {
        $this->validate();
        Unit::create([
            'name' => $this->name
        ]);
        $this->reset();
    }

    public function update() 
    {
        $this->validate();
        Unit::find($this->id)->update([
            'name' => $this->name
        ]);
        $this->reset();
    }
}
