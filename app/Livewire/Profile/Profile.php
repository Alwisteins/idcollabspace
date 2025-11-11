<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $avatar;
    public $currentAvatar;

    public function mount()
    {
        $this->currentAvatar = Auth::user()->avatar;
    }

    public function updatedAvatar()
    {
        // Validasi saat user pilih file
        $this->validate([
            'avatar' => 'image|max:2048', // max 2MB
        ]);
    }

    public function save()
    {
        $this->validate([
            'avatar' => 'image|max:2048',
        ]);

        $user = User::findOrFail(Auth::id());

        // Hapus avatar lama jika ada
        if ($user->avatar && Storage::exists(str_replace('/storage/', 'public/', $user->avatar))) {
            Storage::delete(str_replace('/storage/', 'public/', $user->avatar));
        }

        // Simpan file baru
        $path = $this->avatar->store('avatars', 'public');

        // Update di database
        $user->update([
            'avatar' => '/storage/' . $path,
        ]);

        // Refresh tampilan
        $this->currentAvatar = $user->avatar;
        $this->avatar = null;

        session()->flash('message', 'Avatar berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.profile.profile');
    }
}
