<?php

namespace App\Livewire\Talents;

use App\Models\User;
use Livewire\Component;

class Talent extends Component
{
    public function render()
    {
        return view('livewire.talents.talent', [
            'talents' => User::where('globals_role', 'user')->with('roles')->latest()->paginate(20)
        ]);
    }
}
