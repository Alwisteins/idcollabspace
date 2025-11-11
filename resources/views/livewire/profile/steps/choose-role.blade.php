<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Choose Your Roles</h2>
    <p class="text-gray-500 dark:text-gray-400 mb-4">Pilih maksimal 3 role yang mendeskripsikan posisimu.</p>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($roles as $role)
            <label class="relative cursor-pointer">
                <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}"
                    class="absolute opacity-0 peer" />

                <div
                    class="flex items-center gap-2 border rounded-lg p-3 transition
                    peer-checked:bg-blue-600 peer-checked:text-white 
                    peer-checked:border-blue-600
                    bg-gray-50 hover:bg-gray-100
                    dark:bg-gray-700 dark:hover:bg-gray-600
                    dark:text-gray-200">
                    <span>{{ $role->name }}</span>
                </div>
            </label>
        @endforeach
    </div>

    @error('selectedRoles')
        <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span>
    @enderror
</div>
