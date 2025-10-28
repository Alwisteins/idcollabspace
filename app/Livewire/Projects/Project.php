<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;

    public function getStatusColor($status)
    {
        return match (strtolower($status)) {
            'open' => 'bg-green-100 text-green-700',
            'in progress' => 'bg-yellow-100 text-yellow-700',
            'completed' => 'bg-red-100 text-red-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }

    public function render()
    {
        return view('livewire.projects.project', [
            'projects' => ModelsProject::with('roles.role')->latest()->paginate(10),
        ]);
    }
}
