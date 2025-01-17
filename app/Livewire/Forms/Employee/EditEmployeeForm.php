<?php

namespace App\Livewire\Forms\Employee;

use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditEmployeeForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $name = '';
    #[Validate('required|string|min:3|max:255')]
    public $username = '';
    #[Validate('required|integer|exists:units,id')]
    public $unit_id = '';
    #[Validate('required|array|min:1')]
    public array $position_ids = [];
    #[Validate('required|date')]
    public $join_date = '';
    #[Locked]
    public $id = null;

    public function set($user) {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->unit_id = $user->unit_id;
        $this->join_date = $user->join_date->format('Y-m-d');
        $this->position_ids = $user->positions->pluck('id')->toArray();
        $this->id = $user->id;
    }

    public function update() 
    {
        $this->validate();
        $user = User::find($this->id);
        $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'unit_id' => $this->unit_id,
            'join_date' => $this->join_date
        ]);
        $user->positions()->sync($this->position_ids);
        $this->reset();
    }
}
