<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;

    // --- PROPERTIES ---
    public $search = '';
    public $status;

    // --- KEEP QUERY IN URL ---
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    // --- RESET PAGE ON SEARCH CHANGE ---
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // --- RESET PAGE ON STATUS CHANGE ---
    public function updatingStatus()
    {
        $this->resetPage();
    }

    // --- STATUS COLOR HELPER ---
    public function getStatusColor($status)
    {
        return match (strtolower($status)) {
            'open' => 'bg-red-100 text-red-700',
            'in progress' => 'bg-yellow-100 text-yellow-700',
            'completed' => 'bg-green-100 text-green-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }

    // --- RENDER ---
    public function render()
    {
        $userId = Auth::id();
        $query = ModelsProject::with('roles.role')->latest();

        if ($this->status == 'owner') {
            $query->where('owner_id', $userId);
        } elseif ($this->status == 'collabolator') {
            $query->whereHas('members', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            });
        }

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        return view('livewire.projects.project', [
            'projects' => $query->paginate(10),
        ]);
    }
}
