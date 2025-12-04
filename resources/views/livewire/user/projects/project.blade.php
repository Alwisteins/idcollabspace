<div class="p-6">
    {{-- === FILTER STATUS === --}}
    <div>
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                <button wire:click="$set('status', '')"
                    class="inline-block px-4 py-3 rounded-lg 
                        {{ $status == null ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                    Semua
                </button>
            </li>
            <li class="me-2">
                <button wire:click="$set('status', 'owner')"
                    class="inline-block px-4 py-3 rounded-lg 
                        {{ $status == 'owner' ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                    Dibuat
                </button>
            </li>
            <li class="me-2">
                <button wire:click="$set('status', 'collabolator')"
                    class="inline-block px-4 py-3 rounded-lg 
                        {{ $status == 'collabolator' ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                    Diikuti
                </button>
            </li>
        </ul>
    </div>

    {{-- === SEARCH BAR + CREATE BUTTON === --}}
    <div class="flex justify-between items-center mt-6">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" wire:model.debounce.live.500ms="search"
                class="block w-96 h-full ps-10 px-5 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari Project..." required />
        </div>
        <x-button :icon="config('icons.plus')" wire:navigate href="{{ route('projects.create') }}">Buat
            Project</x-button>
    </div>

    {{-- === PROJECT LIST === --}}
    <div class="grid md:grid-cols-2 gap-8 mt-8">
        @if ($projects->isEmpty())
            <p class="text-center text-gray-600 col-span-2">Tidak ada proyek untuk saat ini.</p>
        @else
            @foreach ($projects as $project)
                <div wire:navigate href="{{ route('projects.show', $project) }}"
                    class="bg-white rounded-2xl p-6 hover:cursor-pointer hover:shadow-xl transition-all border border-gray-200 group hover:-translate-y-1">
                    <div class="flex justify-end">
                        <span
                            class="px-3 py-1 {{ $this->getStatusColor($project->status) }} text-xs font-semibold rounded-md">
                            {{ $project->status }}
                        </span>
                    </div>
                    <div class="flex items-center gap-4 my-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl"></div>
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition">
                            {{ $project->title }}
                        </h3>
                    </div>
                    <p class="text-xs text-gray-600">{{ $project->description }}</p>

                    {{-- Roles Dibutuhkan --}}
                    <div class="mt-3 pt-3 border-t border-gray-300">
                        <div class="text-xs font-semibold text-gray-500 mb-2">Roles Dibutuhkan:</div>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project->roles as $projectRole)
                                <span class="px-3 py-1 bg-stone-100 text-gray-700 text-xs font-medium rounded-full">
                                    {{ $projectRole->role->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    {{-- === PAGINATION === --}}
    <div class="mt-4">
        {{ $projects->links() }}
    </div>

    {{-- === SUCCESS TOAST === --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
</div>
