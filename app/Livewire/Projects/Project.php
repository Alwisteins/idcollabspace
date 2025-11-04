<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;

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
        $status = request()->query('status');
        $userId = Auth::id();
        $query = ModelsProject::with('roles.role')->latest();

        if ($status == 'owner') {
            $query->where('owner_id', $userId);
        } else if ($status == 'collabolator') {
            $query->whereHas('members', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            });
        }

        return view('livewire.projects.project', [
            'projects' => $query->paginate(10),
        ]);
    }
}
