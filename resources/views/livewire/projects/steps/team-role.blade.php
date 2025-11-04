<div class="space-y-4 mb-8">

    <!-- Button buka modal -->
    <div class="flex justify-end">
        <x-button :icon="config('icons.plus')" wireTarget="openModal" wire:click="openModal">Pilih Team Role</x-button>
    </div>

    <!-- ============ MODAL ============ -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-2xl p-6 mx-4">
                <!-- Header -->
                <div class="flex items-center justify-between border-b pb-3">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Pilih Role yang Dibutuhkan
                    </h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="mt-4 grid grid-cols-2 gap-3">
                    @foreach ($roles as $role)
                        @php
                            $isSelected = collect($selectedRoles)->contains('id', $role->id);
                        @endphp

                        <button wire:click="toggleRole({{ $role->id }})"
                            class="p-3 rounded-lg border text-left transition-all
                                {{ $isSelected ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600' }}">
                            {{ $role->name }}
                        </button>
                    @endforeach
                </div>

                <!-- Footer -->
                <div class="mt-6 flex justify-end border-t pt-3">
                    <x-button type="button" wireTarget="closeModal" wire:click="closeModal">Selesai</x-button>
                </div>
            </div>
        </div>
    @endif

    <!-- ============ SELECTED ROLE LIST ============ -->
    @if (count($selectedRoles) > 0)
        <div class="space-y-3">
            @foreach ($selectedRoles as $index => $role)
                <div
                    class="flex items-center justify-between bg-gray-50 dark:bg-gray-800 border rounded-xl p-4 hover:bg-gray-100 transition">
                    <div>
                        <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ $role['name'] }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Jumlah: {{ $role['count'] }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button wire:click="decrementRole({{ $index }})"
                            class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded">-</button>
                        <span class="text-gray-800 dark:text-gray-100 font-semibold">{{ $role['count'] }}</span>
                        <button wire:click="incrementRole({{ $index }})"
                            class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded">+</button>

                        <button wire:click="removeRole({{ $index }})"
                            class="ml-3 text-red-500 hover:text-red-700 transition">Hapus</button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-sm italic">Belum ada role yang dipilih.</p>
    @endif
</div>
