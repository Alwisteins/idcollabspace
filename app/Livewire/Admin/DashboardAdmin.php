<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $totalCategories;
    public $totalRoles;
    public $totalTalents;
    public $totalProjects;

    public $categoryNames = [];
    public $projectCounts = [];

    public $statusLabels = ['open', 'in progress', 'completed'];
    public $statusCounts = [];

    public $roleNames = [];
    public $roleCounts = [];
    public $roleColors = [];

    public function mount()
    {
        // Summary Cards
        $this->totalCategories = Category::count();
        $this->totalRoles = Role::count();
        $this->totalTalents = User::where('globals_role', 'user')->count();
        $this->totalProjects = Project::count();
        $this->roleColors = Role::all();

        // Bar Chart: Project per Category
        $categories = Category::withCount('projects')->get();
        $this->categoryNames = $categories->pluck('name')->toArray();
        $this->projectCounts = $categories->pluck('projects_count')->toArray();


        // Donut Chart: Project per status
        $this->statusCounts = array_map(function ($status) {
            return Project::where('status', $status)->count();
        }, $this->statusLabels);

        // Donut Chart: Role Distribution
        $roles = Role::withCount('users')->get();
        $this->roleNames = $roles->filter(fn($role) => $role->users_count > 0)->pluck('name')->values()->toArray();
        $this->roleCounts = $roles->pluck('users_count')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.dashboard-admin');
    }
}
