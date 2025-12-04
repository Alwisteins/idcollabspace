<?php

namespace App\Livewire\User;

use App\Models\Application;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardUser extends Component
{
    public $labels = [];
    public $data = [];
    public $chartData = [];
    public $applicationsSent = [];
    public $applicationsReceived = [];
    public $followedProjects = 0;
    public $createdProjects = 0;

    public function mount()
    {
        $categories = Category::withCount('projects')->get();
        $this->labels = $categories->pluck('name');
        $this->data = $categories->pluck('projects_count');
        $this->chartData = [
            'labels' => ['Pending', 'Accepted', 'Rejected'],
            'series' => [21, 8, 13],
        ];

        $sentStatuses = Application::where('user_id', Auth::id())
            ->select('status')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        // hasil array urut
        $this->applicationsSent = [
            $sentStatuses['pending'] ?? 0,
            $sentStatuses['accepted'] ?? 0,
            $sentStatuses['rejected'] ?? 0,
        ];

        $receivedStatuses = Application::whereHas('project', function ($q) {
            $q->where('owner_id', Auth::id());
        })->pluck('status')->countBy();

        $this->applicationsReceived = [
            $receivedStatuses->get('pending', 0),
            $receivedStatuses->get('accepted', 0),
            $receivedStatuses->get('rejected', 0),
        ];

        $this->createdProjects = Project::where('owner_id', Auth::id())->count();
    }

    public function render()
    {
        return view('livewire.user.dashboard-user');
    }
}
