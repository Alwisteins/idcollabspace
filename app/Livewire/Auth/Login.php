<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.auth.login');
    }

    public $email;
    public $password;

    public function login()
    {
        Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]);

        if (Auth::check()) {
            return Auth::user()->is_onboarded ? redirect()->route('home') : redirect()->route('onboarding');
        }
    }
}
