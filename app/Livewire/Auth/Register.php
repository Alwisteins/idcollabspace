<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.register');
    }

    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        return redirect()->route('onboarding');
    }
}
