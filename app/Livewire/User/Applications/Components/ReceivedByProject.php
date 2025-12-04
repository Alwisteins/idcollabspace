<?php

namespace App\Livewire\User\Applications\Components;

use App\Models\Application;
use App\Models\Project;
use App\Models\ProjectMember;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReceivedByProject extends Component
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
        $application = Application::findOrFail($applicationId);

        // create member
        ProjectMember::create([
            'project_id' => $this->project->id,
            'project_role_id' => $application->project_role_id,
            'user_id' => $application->user_id,
            'joined_at' => now(),
        ]);

        $application->status = 'accepted';
        $application->save();

        session()->flash('success', 'Pelamar diterima dan ditambahkan sebagai anggota.');
        $this->project->refresh();
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
        return view('livewire.user.applications.components.received-by-project');
    }
}
