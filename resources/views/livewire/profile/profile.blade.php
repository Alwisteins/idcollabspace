<div class="flex flex-col lg:flex-row p-6 lg:p-10 gap-6">
    {{-- Kartu Profil Kiri --}}
    <div class="p-6 flex flex-col items-center gap-4 bg-white border rounded-xl shadow-sm w-full lg:w-1/3">
        {{-- Avatar --}}
        @if ($currentAvatar)
            <img src="{{ $currentAvatar }}" alt="Avatar"
                class="w-40 h-auto md:w-56 md:h-auto aspect-square object-cover rounded-full border-4 border-blue-500 shadow-sm" />
        @else
            <div
                class="w-40 h-40 md:w-56 md:h-56 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center border-4 border-blue-500 shadow-sm">
                <h3 class="text-4xl font-bold text-white">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</h3>
            </div>
        @endif

        {{-- Nama & Lokasi --}}
        <div class="text-center">
            <h1 class="text-2xl font-bold text-gray-800">{{ auth()->user()->name }}</h1>
            @if (auth()->user()->location)
                <p class="text-gray-500">{{ auth()->user()->location }}</p>
            @endif
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex flex-col gap-3 mt-2">
            <input type="file" wire:model="avatar" accept="image/*" class="hidden" id="avatarInput">
            <x-button :variant="'secondary'" :icon="config('icons.camera')" onclick="document.getElementById('avatarInput').click()"
                wireTarget="avatar">
                Pilih Gambar
            </x-button>
            @error('avatar')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
            <x-button wire:navigate href="{{ route('profile.edit') }}" :icon="config('icons.pencil-square')" wireTarget="edit">
                Edit Profil
            </x-button>
        </div>
    </div>

    @if ($avatar)
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="absolute inset-0 bg-black opacity-30" wire:click="closeApplModal"></div>
            <div class="flex flex-col items-center gap-4 bg-white rounded-xl shadow-xl w-full max-w-lg p-6 z-10">
                <h4 class="text-gray-600 mb-2">Preview:</h4>
                <img src="{{ $avatar->temporaryUrl() }}" alt="Preview"
                    class="w-40 h-40 md:w-56 md:h-56 object-cover rounded-full border-4 border-blue-400 shadow-sm">
                <div class="mt-4 flex gap-4">
                    <x-button :variant="'secondary'" wire:click="$set('$avatar', null)">Batal</x-button>
                    <x-button wire:click="save" wireTarget="save">Simpan</x-button>
                </div>
            </div>
        </div>
    @endif

    {{-- Kartu Detail Kanan --}}
    <div class="p-6 w-full flex flex-col gap-6 bg-white border rounded-xl shadow-sm">
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Tentang Saya</h3>
            @if (auth()->user()->description)
                <p class="text-gray-600 leading-relaxed">{{ auth()->user()->description }}</p>
            @else
                <p class="text-gray-400 italic">Belum ada deskripsi. Ceritakan sedikit tentang dirimu di bagian edit
                    profil.</p>
            @endif
        </div>

        {{-- Roles --}}
        @if (auth()->user()->roles && auth()->user()->roles->count() > 0)
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Peran / Keahlian</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach (auth()->user()->roles as $role)
                        <span
                            class="px-4 py-1 bg-blue-100 text-blue-700 text-sm font-medium rounded-full border border-blue-200">
                            {{ $role->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Detail Tambahan --}}
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-3">Informasi Akun</h3>
            <ul class="text-gray-600 space-y-2">
                <li><span class="font-semibold w-32 inline-block">Email:</span> {{ auth()->user()->email }}</li>
                <li><span class="font-semibold w-32 inline-block">Bergabung:</span>
                    {{ auth()->user()->created_at->format('d M Y') }}</li>
            </ul>
        </div>
    </div>
    {{-- Flash messages --}}
    <div class="fixed bottom-6 right-6 z-50">
        @if (session()->has('success'))
            <div class="px-4 py-2 bg-green-600 text-white rounded-lg shadow">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="px-4 py-2 bg-red-600 text-white rounded-lg shadow">{{ session('error') }}</div>
        @endif
    </div>
</div>
