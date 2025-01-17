<?php

namespace App\Livewire\Forms\Login;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|min:3')]
    public $username = '';

    #[Validate('required|min:8')]
    public $password = '';

    public function login() 
    {
        $this->validate();
        return auth()->attempt([
            'username' => $this->username,
            'password' => $this->password,
        ]);
    }
}
