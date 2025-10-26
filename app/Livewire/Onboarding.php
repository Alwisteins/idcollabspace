<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Onboarding extends Component
{
    public $currentStep = 1;
    public $name, $location, $description;
    public $selectedRoles = [];
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }

    public function prevStep()
    {
        $this->currentStep--;
    }

    protected function validateStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'name' => 'required|min:3',
                'location' => 'required',
                'description' => 'required|min:10',
            ]);
        } elseif ($this->currentStep === 2) {
            $this->validate([
                'selectedRoles' => 'required|array|max:3',
            ]);
        }
    }

    public function getRoleName($id)
    {
        return Role::find($id)?->name ?? 'Unknown';
    }

    public function submit()
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'is_onboarded' => true
        ]);

        $user->roles()->sync($this->selectedRoles);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.onboarding');
    }
}
