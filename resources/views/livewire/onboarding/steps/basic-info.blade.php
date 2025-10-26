<div>
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Basic Information</h2>
    <form wire:submit.prevent="nextStep">
        <div class="flex gap-4 mb-4">
            <div class="w-full">
                <label for="name" class="label">Full Name</label>
                <input type="text" id="name" class="form-input" wire:model.defer="name" placeholder="John Doe">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full">
                <label for="location" class="label">Location</label>
                <input type="text" id="location" class="form-input" wire:model.defer="location"
                    placeholder="Jakarta, Indonesia">
                @error('location')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="label">Short Description</label>
            <textarea id="description" class="form-input" rows="3" wire:model.defer="description"
                placeholder="Describe yourself briefly..."></textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    </form>
</div>
