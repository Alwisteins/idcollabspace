<?php

namespace App\Livewire\Applications;

use App\Models\Project;
use Livewire\Component;

class ApplicationByProject extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project = $project->load(['applications.user', 'applications.projectRole.role']);
    }

    public function getStatusColor($status)
    {
        return match (strtolower($status)) {
            'pending' => 'bg-yellow-100 text-yellow-700',
            'accepted' => 'bg-green-100 text-green-700',
            'rejected' => 'bg-red-100 text-red-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }

    public function acceptApplication($applicationId)
    {
        $application = $this->project->applications->find($applicationId);
        if ($application) {
            $application->update(['status' => 'accepted']);
            $this->project->refresh();
        }
    }

    public function rejectApplication($applicationId)
    {
        $application = $this->project->applications->find($applicationId);
        if ($application) {
            $application->update(['status' => 'rejected']);
            $this->project->refresh();
        }
    }

    public function render()
    {
        return view('livewire.applications.components.received-by-project');
    }
}
