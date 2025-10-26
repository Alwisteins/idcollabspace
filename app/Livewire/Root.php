<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Root extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}
