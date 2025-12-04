<?php

namespace App\Livewire\User\Projects;

use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectRole;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectForm extends Component
{
    public $project;
    public $mode = 'create';
    public $categories, $roles = [];
    public $selectedRoles = [];
    public $title, $category_id, $status = "open", $is_paid = 0, $start_date, $end_date, $description;
    public $steps = ['Detail Proyek', 'Role Tim', 'Konfirmasi'];
    public $currentStep = 1;
    public $showModal = false;

    public function mount(Project $project)
    {
        $this->categories = Category::all();
        $this->roles = Role::all();

        if ($project && $project->exists) {
            // Mode edit
            $this->mode = 'edit';
            $this->project = $project->load('roles');

            $this->title = $project->title;
            $this->category_id = $project->category_id;
            $this->status = $project->status;
            $this->is_paid = $project->is_paid;
            $this->start_date = $project->start_date;
            $this->end_date = $project->end_date;
            $this->description = $project->description;

            // Ambil role yang sudah ada
            $this->selectedRoles = $project->roles->map(fn($r) => [
                'id' => $r->role_id,
                'name' => $r->role->name,
                'count' => 1
            ])->toArray();
        } else {
            // Mode create
            $this->mode = 'create';
            $this->status = 'open';
            $this->is_paid = 0;
        }
    }

    /** ============ Modal Control ============ */
    public function openModal()
    {
        $this->showModal = true;
    }
    public function closeModal()
    {
        $this->showModal = false;
    }

    /** ============ Role Selection Logic ============ */
    public function toggleRole($roleId)
    {
        // ubah role jadi collection & cari role berdasrkan id dari list roles
        $role = collect($this->roles)->firstWhere('id', $roleId);
        if (!$role) return;

        // ubah role jadi collection & cari role berdasrkan id dari selectedRoles
        $exists = collect($this->selectedRoles)->firstWhere('id', $roleId);
        if ($exists) {
            // hapus role yang dipilih dari selectedRoles. cara kerja:
            // 1) array_filter untuk filter selectedRoles by id
            // 2) array_values urutin index hasil filter
            $this->selectedRoles = array_values(array_filter($this->selectedRoles, fn($r) => $r['id'] !== $roleId));
        } else {
            $this->selectedRoles[] = [
                'id' => $role->id,
                'name' => $role->name,
                'count' => 1,
            ];
        }
    }

    public function incrementRole($index)
    {
        if (isset($this->selectedRoles[$index])) {
            $this->selectedRoles[$index]['count']++;
        }
    }

    public function decrementRole($index)
    {
        if (isset($this->selectedRoles[$index]) && $this->selectedRoles[$index]['count'] > 1) {
            $this->selectedRoles[$index]['count']--;
        }
    }

    public function removeRole($index)
    {
        unset($this->selectedRoles[$index]);
        $this->selectedRoles = array_values($this->selectedRoles);
    }

    /** ============ Step Controls ============ */
    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'title' => 'required|min:6',
                'category_id' => 'required',
                'status' => 'required',
                'is_paid' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'description' => 'required'
            ]);
        } elseif ($this->currentStep === 2) {
            $this->validate([
                'selectedRoles' => 'required|array|min:1',
            ]);
        }
        $this->currentStep++;
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) $this->currentStep--;
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

    /** ============ Create / Update ============ */
    public function submit()
    {
        $validated = $this->validate([
            'title' => 'required|min:6',
            'category_id' => 'required',
            'status' => 'required',
            'is_paid' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required',
            'selectedRoles' => 'required|array|min:1',
        ]);

        if ($this->mode === 'create') {
            $project = Project::create([
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'status' => $this->status,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'is_paid' => $this->is_paid,
                'owner_id' => Auth::id(),
            ]);

            foreach ($this->selectedRoles as $role) {
                $count = (int) $role['count'];
                ProjectRole::create([
                    'project_id' => $project->id,
                    'role_id' => $role['id'],
                    'quantity' => $count
                ]);
            }

            session()->flash('success', 'Project berhasil dibuat.');
        } else {
            // Update project
            $this->project->update([
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'status' => $this->status,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'is_paid' => $this->is_paid,
            ]);

            // Sinkronisasi role (hapus lama, simpan baru)
            $this->project->roles()->delete();
            foreach ($this->selectedRoles as $role) {
                $count = (int) $role['count'];
                ProjectRole::create([
                    'project_id' => $this->project->id,
                    'role_id' => $role['id'],
                    'quantity' => $count
                ]);
            }

            session()->flash('success', 'Project berhasil diperbarui.');
        }

        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.user.projects.project-form', [
            'statusColor' => $this->getStatusColor($this->project->status ?? 'unknown'),
        ]);
    }
}
