<?php

namespace App\Livewire\Projects;

use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectRole;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectCreate extends Component
{
    public $categories;
    public $steps = ['Detail Proyek', 'Role Tim', 'Konfirmasi'];
    public $currentStep = 1;

    // Step 1
    public $title, $category_id, $status = "open", $is_paid = 0, $start_date, $end_date, $description;

    // Step 2
    public $showModal = false;
    public $roles = [];
    public $selectedRoles = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->roles = Role::all();
    }

    /** ============ Modal Controls ============ */
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
        $role = collect($this->roles)->firstWhere('id', $roleId);

        if (!$role) return;

        // Cek apakah role sudah dipilih
        $exists = collect($this->selectedRoles)->firstWhere('id', $roleId);

        if ($exists) {
            // Hapus jika sudah ada (toggle off)
            $this->selectedRoles = array_filter($this->selectedRoles, fn($r) => $r['id'] !== $roleId);
        } else {
            // Tambahkan role baru dengan count default = 1
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
        $this->selectedRoles = array_values($this->selectedRoles); // reindex array
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
                'selectedRoles' => 'required|array',
            ]);
        }
        $this->currentStep++;
    }

    public function prevStep()
    {
        $this->currentStep--;
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

    public function submit()
    {
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
            ProjectRole::create([
                'project_id' => $project->id,
                'role_id' => $role['id'],
                'is_filled' => 0
            ]);
        }

        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.projects.project-create', [
            'statusColor' => $this->getStatusColor($this->project->status ?? 'unknown'),
        ]);
    }
}
