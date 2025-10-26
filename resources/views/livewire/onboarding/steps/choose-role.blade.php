<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Choose Your Roles</h2>
    <p class="text-gray-500 dark:text-gray-400 mb-4">Pilih maksimal 3 role yang mendeskripsikan posisimu.</p>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($roles as $role)
            <label
                class="flex items-center gap-2 border rounded-lg p-3 cursor-pointer hover:bg-blue-50 dark:hover:bg-gray-700">
                <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}"
                    class="text-blue-600 focus:ring-blue-500 rounded">
                <span class="text-gray-800 dark:text-gray-100">{{ $role->name }}</span>
            </label>
        @endforeach
    </div>

    @error('selectedRoles')
        <span class="error">{{ $message }}</span>
    @enderror
</div>
