<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use App\Models\Application;
use App\Models\ProjectMember;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProjectDetail extends Component
{
    public Project $project;
    public $projectId;

    // UI state
    public $showApplyModal = false;
    public $applyRoleId = null;
    public $applyMessage = '';

    protected $listeners = [
        'refreshProject' => 'loadProject'
    ];

    public function mount($id)
    {
        $this->projectId = $id;
        $this->loadProject();
    }

    public function loadProject()
    {
        // Eager load all necessary relations
        $this->project = Project::with([
            'category',
            'owner',
            'roles.role',
            'roles.members.user',
            'roles.members',
            'applications.user',
            'members.user', // if you have a members relation
        ])->findOrFail($this->projectId);
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

    public function openApplyModal($projectRoleId)
    {
        if (!Auth::check()) {
            session()->flash('error', 'Silakan login untuk melamar.');
            return;
        }
        $this->applyRoleId = $projectRoleId;
        $this->applyMessage = '';
        $this->showApplyModal = true;
    }

    public function closeApplyModal()
    {
        $this->showApplyModal = false;
        $this->applyRoleId = null;
        $this->applyMessage = '';
    }

    public function apply()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Silakan login untuk melamar.');
            return;
        }

        $this->validate([
            'applyMessage' => 'required|string|min:10|max:1000',
            'applyRoleId' => 'required|integer',
        ]);

        // Check duplicate application
        $exists = Application::where('project_id', $this->project->id)
            ->where('project_role_id', $this->applyRoleId)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            session()->flash('error', 'Kamu sudah melamar untuk role ini.');
            $this->closeApplyModal();
            return;
        }

        Application::create([
            'project_id' => $this->project->id,
            'project_role_id' => $this->applyRoleId,
            'user_id' => Auth::id(),
            'message' => $this->applyMessage,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Lamaran berhasil dikirim.');
        $this->closeApplyModal();
        $this->loadProject();
    }

    public function withdrawApplication($applicationId)
    {
        $application = Application::findOrFail($applicationId);

        if ($application->user_id !== Auth::id()) {
            abort(403);
        }

        $application->delete();
        session()->flash('success', 'Lamaran dibatalkan.');
        $this->loadProject();
    }

    // Owner actions
    public function acceptApplication($applicationId)
    {
        $application = Application::findOrFail($applicationId);

        if (Auth::id() !== $this->project->owner_id) {
            abort(403);
        }

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
        $this->loadProject();
    }

    public function rejectApplication($applicationId)
    {
        $application = Application::findOrFail($applicationId);

        if (Auth::id() !== $this->project->owner_id) {
            abort(403);
        }

        $application->status = 'rejected';
        $application->save();

        session()->flash('success', 'Pelamar ditolak.');
        $this->loadProject();
    }

    public function delete($projectId)
    {
        $project = Project::findOrFail($projectId);
        // Opsional: pastikan hanya owner yang bisa hapus
        if ($project->owner_id !== Auth::id()) {
            abort(403, 'Anda tidak punya izin untuk menghapus proyek ini.');
        }

        $project->delete();

        session()->flash('success', 'Project berhasil dihapus');
        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.projects.project-detail', [
            'statusColor' => $this->getStatusColor($this->project->status ?? 'unknown'),
        ]);
    }
}
