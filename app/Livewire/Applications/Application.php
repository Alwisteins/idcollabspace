<?php

namespace App\Livewire\Applications;

use App\Models\Application as ModelsApplication;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Application extends Component
{
    public $applicationsSent;
    public $applicationsReceived;

    public function getStatusColor($status)
    {
        return match (strtolower($status)) {
            'pending' => 'bg-yellow-100 text-yellow-700',
            'in progress' => 'bg-yellow-100 text-yellow-700',
            'rejected' => 'bg-red-100 text-red-700',
            'open' => 'bg-red-100 text-red-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }

    public function mount()
    {
        $this->applicationsSent = ModelsApplication::where('user_id', Auth::id())
            ->with(['project', 'projectRole.role'])
            ->latest()
            ->get();

        $this->applicationsReceived = Project::where('owner_id', Auth::id())
            ->where('status', '<>', 'completed')
            ->whereHas('applications')
            // ->whereHas('applications', function ($q) {
            //     $q->where('status', 'pending');
            // })
            ->with(['applications.user', 'applications.projectRole.role'])
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.applications.application');
    }
}
