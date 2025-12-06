<?php

namespace App\Livewire\User\Projects;

use App\Models\Project;
use App\Models\Task;
use App\Models\ProjectComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Workspace extends Component
{
    public Project $project;

    public $newComment = '';
    public $taskId, $taskTitle, $taskDescription, $taskStatus = 'todo', $taskLoad = 1, $taskDeadline, $taskAssignee = [];
    public $showModal = false;

    public function openModal($status = null)
    {
        $this->taskStatus = $status;
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->taskId = null;
        $this->taskTitle = '';
        $this->resetValidation();
    }

    public function loadStyle($load)
    {
        if ($load > 6) {
            return 'text-red-600';
        } else if ($load > 3) {
            return 'text-yellow-600';
        } else {
            return 'text-green-600';
        }
    }

    public function mount(Project $project)
    {
        // Pastikan route memakai {project} untuk model binding otomatis
        $this->project = $project;

        // Cek apakah user adalah owner atau member
        if (
            !$project->members->contains('user_id', Auth::id()) &&
            $project->owner_id !== Auth::id()
        ) {
            abort(403);
        }
    }

    public function storeTask()
    {
        $this->validate([
            'taskTitle' => 'required|min:3',
            'taskAssignee' => 'array',
        ]);

        if ($this->taskId) {
            // UPDATE
            $task = Task::findOrFail($this->taskId);
            $task->update([
                'title' => $this->taskTitle,
                'description' => $this->taskDescription,
                'status' => $this->taskStatus,
                'load' => $this->taskLoad,
                'deadline' => $this->taskDeadline,
            ]);

            $task->assignees()->sync($this->taskAssignee);

            session()->flash('message', 'Task berhasil diupdate!');
        } else {
            // CREATE
            $task = Task::create([
                'title' => $this->taskTitle,
                'description' => $this->taskDescription,
                'status' => $this->taskStatus,
                'deadline' => $this->taskDeadline,
                'load' => $this->taskLoad,
                'project_id' => $this->project->id,
            ]);

            $task->assignees()->sync($this->taskAssignee);

            session()->flash('message', 'Task berhasil ditambahkan!');
        }

        $this->closeModal();
    }

    public $hasTaskAccess = false;
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        $this->taskId = $task->id;
        $this->taskTitle = $task->title;
        $this->taskDescription = $task->description;
        $this->taskStatus = $task->status;
        $this->taskLoad = $task->load;
        $this->taskDeadline = $task->deadline ? $task->deadline->format('Y-m-d') : null;
        $this->taskAssignee = $task->assignees()->pluck('users.id')->toArray();
        $this->showModal = true;
        $this->hasTaskAccess = Auth::id() === $task->project->owner_id || $task->assignees->contains(Auth::id());
    }

    public function updateTaskStatus($taskId, $direction)
    {
        $task = Task::findOrFail($taskId);

        $statuses = ['todo', 'in progress', 'done'];
        $currentIndex = array_search($task->status, $statuses);

        if ($direction === 'next' && $currentIndex < count($statuses) - 1) {
            $task->status = $statuses[$currentIndex + 1];
        }

        if ($direction === 'previous' && $currentIndex > 0) {
            $task->status = $statuses[$currentIndex - 1];
        }

        $task->save();
    }

    public function confirmDelete()
    {
        $this->dispatch('confirm-delete-task', taskId: $this->taskId);
    }

    #[On('delete-task')]
    public function deleteTask($taskId)
    {
        $task = Task::findOrFail($taskId);

        if ($task->project_id !== $this->project->id) abort(403);

        $task->delete();
        $this->resetForm();
        $this->closeModal();

        session()->flash('success', 'Tugas berhasil dihapus.');
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|min:2|max:500',
        ]);

        ProjectComment::create([
            'project_id' => $this->project->id,
            'user_id' => Auth::id(),
            'message' => $this->newComment,
        ]);

        $this->reset('newComment');
    }

    public function deleteComment($commentId)
    {
        $comment = ProjectComment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id() && $this->project->owner_id !== Auth::id()) {
            abort(403);
        }

        $comment->delete();
    }

    public function render()
    {
        return view('livewire.user.projects.workspace', [
            'tasks' => $this->project->tasks()->latest()->get(),
            'comments' => $this->project->comments()->latest()->get(),
            'members' => $this->project->members()->with('user')->get(),
        ]);
    }
}
