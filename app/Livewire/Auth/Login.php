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
            if ($user->is_onboarded) {
                return $user->globals_role == 'user' ? redirect()->route('user.home') : redirect()->route('admin.home');
            } else {
                return redirect()->route('onboarding');
            }
        }

        return $this->addError('email', 'Email atau password salah.');
    }
}
