<?php

namespace App\Livewire\Forms\Employee;

use App\Models\User;
use Hash;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $name = '';
    #[Validate('required|string|min:3|max:255')]
    public $username = '';
    #[Validate('required|confirmed|string|min:8|max:255')]
    public $password = '';
    #[Validate('required|string|min:8|max:255')]
    public $password_confirmation = '';
    #[Validate('required|integer|exists:units,id')]
    public $unit_id = '';
    #[Validate('required|date')]
    public $join_date = '';
    #[Locked]
    public $id = null;

    public function setUnit($position) {
        $this->name = $position->name;
        $this->id = $position->id;
    }

    public function store() 
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
            'unit_id' => $this->unit_id,
            'join_date' => $this->join_date
        ]);
        $this->reset();
    }

    public function update() 
    {
        $this->validate();
        User::find($this->id)->update([
            'name' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
            'unit_id' => $this->unit_id,
            'join_date' => $this->join_date
        ]);
        $this->reset();
    }
}
