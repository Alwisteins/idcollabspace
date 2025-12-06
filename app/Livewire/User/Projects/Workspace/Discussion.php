<?php

namespace App\Livewire\User\Projects\Workspace;

use App\Models\Project;
use App\Models\ProjectComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Discussion extends Component
{
    public Project $project;
    public $comments = [];    // Jika komentar terhubung ke proyek
    public $newComment = '';

    protected $rules = [
        'newComment' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = ProjectComment::with('user')
            ->where('project_id', $this->project->id)
            ->latest()
            ->get();
    }

    public function sendComment()
    {
        $this->validate();

        ProjectComment::create([
            'project_id' => $this->project->id,
            'user_id' => Auth::id(),
            'message' => $this->newComment,
        ]);

        $this->newComment = '';

        $this->loadComments();
    }


    public function render()
    {
        return view('livewire.user.projects.workspace.discussion');
    }
}
