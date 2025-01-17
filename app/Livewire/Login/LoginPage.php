<?php

namespace App\Livewire\Login;

use App\Livewire\Forms\Login\LoginForm;
use App\Models\LogLogin;
use Livewire\Component;

class LoginPage extends Component
{
    public LoginForm $form;
    public $isInvalid = false;

    public function render()
    {
        return view('livewire.login.login-page')
            ->layout('components.layouts.login');
    }

    public function login()
    {
        if (!$this->form->login()) {
            $this->isInvalid = true;
            return;
        }
        LogLogin::create([
            'user_id' => auth()->user()->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return $this->redirect('/');
    }
}
