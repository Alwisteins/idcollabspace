<div>
    {{-- Flash Messages --}}
    @if (session()->has('message'))
        <x-flash-message message="{{ session('message') }}" />
    @endif

    @if (session()->has('error'))
        <x-flash-message type="error" message="{{ session('error') }}" />
    @endif

    <div class="p-6 space-y-6">

        {{-- === SEARCH BAR + CREATE BUTTON === --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">

            {{-- Search --}}
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" wire:model.live.debounce.500ms="search"
                    class="block w-full sm:w-96 pl-10 px-5 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-600 focus:border-blue-600 transition"
                    placeholder="Cari Role..." />
            </div>

            {{-- Create Button --}}
            <x-button wire:click="openModal" :icon="config('icons.plus')">Tambah Role</x-button>
        </div>



        {{-- === TABLE === --}}
        <div class="border border-gray-200 rounded-xl overflow-hidden shadow-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">
                                Role
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">
                                Digunakan oleh
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($roles as $role)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                            </svg>
                                        </div>
                                        <span>{{ $role->name }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-center">
                                    <span
                                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 border border-blue-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                        <span class="font-semibold">{{ $role->users_count }}</span>
                                        <span class="text-xs">{{ $role->users_count === 1 ? 'user' : 'users' }}</span>
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    <div class="flex gap-2 justify-center">

                                        {{-- EDIT --}}
                                        <button wire:click="edit({{ $role->id }})"
                                            class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white transition transform hover:scale-105 shadow-md hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Edit</span>
                                        </button>

                                        {{-- DELETE --}}
                                        <button x-on:click="$dispatch('confirm-delete', { id: {{ $role->id }} })"
                                            @disabled($role->users_count > 0)
                                            class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-lg text-white bg-red-600 hover:bg-red-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition transform hover:scale-105 shadow-md hover:shadow-lg disabled:transform-none disabled:shadow-none"
                                            title="{{ $role->users_count > 0 ? 'Role tidak dapat dihapus karena masih digunakan' : 'Hapus role' }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-500">
                                        <svg class="w-20 h-20 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <p class="text-lg font-semibold text-gray-700 mb-1">Tidak ada role yang
                                            ditemukan
                                        </p>
                                        @if ($search)
                                            <p class="text-sm text-gray-500 mb-4">Pencarian untuk
                                                "{{ $search }}"
                                                tidak
                                                menemukan hasil</p>
                                        @else
                                            <p class="text-sm text-gray-500 mb-4">Belum ada role yang dibuat</p>
                                            <button wire:click="openModal"
                                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition">
                                                Tambah Role Pertama
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($roles->hasPages())
                <div class="border-t border-gray-200">
                    {{ $roles->links('components.pagination') }}
                </div>
            @endif
        </div>
    </div>



    {{-- === ROLE MODAL === --}}
    @if ($showModal)
        <x-role-modal roleId="{{ $roleId }}" />
    @endif

    {{-- Custom CSS for x-cloak --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script>
        document.addEventListener('confirm-delete', function(event) {
            const id = event.detail.id;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data role tidak dapat dipulihkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete-role', {
                        id: id
                    })
                }
            })
        });
    </script>
</div>
