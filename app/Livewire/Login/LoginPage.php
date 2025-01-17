<?php

namespace App\Livewire\Login;

use App\Livewire\Forms\Login\LoginForm;
use Livewire\Component;

class LoginPage extends Component
{
    public LoginForm $form;

    public function render()
    {
        return view('livewire.login.login-page')
            ->layout('components.layouts.login');
    }

    public function login()
    {
        if (!$this->form->login()) {
            
        }
        return $this->redirect('dashboard.index');
    }
}
