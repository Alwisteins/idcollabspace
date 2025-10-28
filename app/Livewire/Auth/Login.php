<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
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
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba autentikasi
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            // Regenerasi session ID (keamanan)
            session()->regenerate();

            // Arahkan berdasarkan status onboarding
            return $user->is_onboarded
                ? redirect()->route('home')
                : redirect()->route('onboarding');
        }

        return $this->addError('email', 'Email atau password salah.');
    }
}
