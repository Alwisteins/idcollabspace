<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryId = null;
    public $name = '';
    public $showModal = false;

    protected $listeners = [
        'delete-kategori' => 'delete'
    ];

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
    ];

    protected $queryString = [
        'search' => ['except' => ''],
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
        $this->categoryId = null;
        $this->name = '';
        $this->resetValidation();
    }

    public function store()
    {
        if ($this->categoryId) {
            // UPDATE - Ignore unique validation for current role
            $this->rules['name'] = 'required|string|max:255|unique:categories,name,' . $this->categoryId;
        }

        $this->validate();

        if ($this->categoryId) {
            // UPDATE
            $category = ModelsCategory::findOrFail($this->categoryId);
            $category->update([
                'name' => $this->name,
            ]);

            session()->flash('message', 'Kategori berhasil diupdate!');
        } else {
            // CREATE
            ModelsCategory::create([
                'name' => $this->name,
            ]);

            session()->flash('message', 'Kategori berhasil ditambahkan!');
        }

        $this->closeModal();
        $this->resetPage();
    }

    public function edit($id)
    {
        $category = ModelsCategory::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->showModal = true;
    }

    public function delete($id)
    {
        $categories = ModelsCategory::findOrFail($id);

        if ($categories->projects()->count() > 0) {
            session()->flash('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh ' . $categories->projects()->count() . ' projects!');
            return;
        }

        $categories->delete();
        session()->flash('message', 'Kategori berhasil dihapus!');
        $this->resetPage();
    }

    public function render()
    {
        $query = ModelsCategory::withCount('projects')->latest();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        return view('livewire.admin.categories', [
            'categories' => $query->paginate(5),
        ]);
    }
}
