<?php

namespace App\Livewire\Talents;

use App\Models\User;
use Livewire\Component;

class TalentDetail extends Component
{
    public $talent;
    public $ownedProjects;
    public $joinedProjects;

    public function mount($id)
    {
        $this->talent = User::with(['roles', 'ownedProjects', 'joinedProjects'])
            ->findOrFail($id);

        // Ambil project terbaru yang dibuat user
        $this->ownedProjects = collect()
            ->merge($this->talent->ownedProjects)
            ->sortByDesc('created_at')
            ->take(3);

        // Ambil project terbaru yang diikuti user
        $this->joinedProjects = collect()
            ->merge($this->talent->joinedProjects)
            ->sortByDesc('created_at')
            ->take(3);
    }

    public function getStatusColor($status)
    {
        return match (strtolower($status)) {
            'open' => 'bg-red-100 text-red-700',
            'in progress' => 'bg-yellow-100 text-yellow-700',
            'completed' => 'bg-green-100 text-green-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }

    public function render()
    {
        return view('livewire.talents.talent-detail');
    }
}
