<?php

namespace App\Livewire\User\Talents;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Talent extends Component
{
    use WithPagination;

    public $search = '';

    public $queryString = [
        'search' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::where('globals_role', 'user')->where('is_onboarded', '1')->with('roles')->latest();

        if ($this->search) {
            $search = '%' . $this->search . '%';
            $query->where('name', 'like', $search)
                ->orWhere('location', 'like', $search)
                ->orWhereHas('roles', function ($q) use ($search) {
                    $q->where('name', 'like', $search);
                });
        }

        return view('livewire.user.talents.talent', [
            'talents' => $query->paginate(20)
        ]);
    }
}
