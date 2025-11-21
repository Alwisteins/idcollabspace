<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Role as ModelsRole;
use Livewire\Component;
use Livewire\WithPagination;

class Role extends Component
{
    use WithPagination;

    public $search = '';
    public $name = '';
    public $roleId = null;
    public $showModal = false;

    protected $listeners = [
        'delete-role' => 'delete'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openModal()
    {
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
        $this->roleId = null;
        $this->name = '';
        $this->resetValidation();
    }

    public function store()
    {
        if ($this->roleId) {
            // UPDATE - Ignore unique validation for current role
            $this->rules['name'] = 'required|string|max:255|unique:roles,name,' . $this->roleId;
        }

        $this->validate();

        if ($this->roleId) {
            // UPDATE
            $role = ModelsRole::findOrFail($this->roleId);
            $role->update([
                'name' => $this->name,
            ]);

            session()->flash('message', 'Role berhasil diupdate!');
        } else {
            // CREATE
            ModelsRole::create([
                'name' => $this->name,
            ]);

            session()->flash('message', 'Role berhasil ditambahkan!');
        }

        $this->closeModal();
        $this->resetPage();
    }

    public function edit($id)
    {
        $role = ModelsRole::findOrFail($id);

        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->showModal = true;
    }

    public function delete($id)
    {
        $role = ModelsRole::findOrFail($id);

        if ($role->users()->count() > 0) {
            session()->flash('error', 'Role tidak dapat dihapus karena masih digunakan oleh ' . $role->users()->count() . ' user!');
            return;
        }

        $role->delete();
        session()->flash('message', 'Role berhasil dihapus!');
        $this->resetPage();
    }

    public function render()
    {
        $query = ModelsRole::withCount('users')->latest();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        return view('livewire.admin.roles.role', [
            'roles' => $query->paginate(5),
        ]);
    }
}
