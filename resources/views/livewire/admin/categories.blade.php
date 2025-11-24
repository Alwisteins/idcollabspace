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
                    placeholder="Cari Kategori..." />
            </div>

            {{-- Create Button --}}
            <x-button wire:click="openModal" :icon="config('icons.plus')">Tambah Kategori</x-button>
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
                                Digunakan di
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($categories as $category)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 text-blue-600">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </div>
                                        <span>{{ $category->name }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-center">
                                    <span
                                        class="inline-flex items-center justify-between w-2/3 gap-2 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 border border-blue-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" width="16"
                                            height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                                        </svg>
                                        <span class="font-semibold">{{ $category->projects_count }}</span>
                                        <span
                                            class="text-xs">{{ $category->projects_count === 1 ? 'project' : 'projects' }}</span>
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    <div class="flex gap-2 justify-center">

                                        {{-- EDIT --}}
                                        <button wire:click="edit({{ $category->id }})"
                                            class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white transition transform hover:scale-105 shadow-md hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Edit</span>
                                        </button>

                                        {{-- DELETE --}}
                                        <button x-on:click="$dispatch('confirm-delete', { id: {{ $category->id }} })"
                                            @disabled($category->projects_count > 0)
                                            class="flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-lg text-white bg-red-600 hover:bg-red-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition transform hover:scale-105 shadow-md hover:shadow-lg disabled:transform-none disabled:shadow-none"
                                            title="{{ $category->projects_count > 0 ? 'Kategori tidak dapat dihapus karena masih digunakan' : 'Hapus kategori' }}">
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
                                        <p class="text-lg font-semibold text-gray-700 mb-1">Tidak ada kategori yang
                                            ditemukan
                                        </p>
                                        @if ($search)
                                            <p class="text-sm text-gray-500 mb-4">Pencarian untuk
                                                "{{ $search }}"
                                                tidak
                                                menemukan hasil</p>
                                        @else
                                            <p class="text-sm text-gray-500 mb-4">Belum ada kategori yang dibuat</p>
                                            <button wire:click="openModal"
                                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition">
                                                Tambah Kategori Pertama
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
            @if ($categories->hasPages())
                <div class="border-t border-gray-200">
                    {{ $categories->links('components.pagination') }}
                </div>
            @endif
        </div>
    </div>

    {{-- === CATEGORY MODAL === --}}
    @if ($showModal)
        <x-category-modal categoryId="{{ $categoryId }}" />
    @endif

    <script>
        document.addEventListener('confirm-delete', function(event) {
            const id = event.detail.id;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data kategori tidak dapat dipulihkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete-kategori', {
                        id: id
                    })
                }
            })
        });
    </script>
</div>
