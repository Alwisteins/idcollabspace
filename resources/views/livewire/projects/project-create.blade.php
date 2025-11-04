<div class="p-6">
    <div class="mb-6 flex justify-between items-center">
        <x-button wire:navigate href="{{ route('projects.index') }}" :icon="config('icons.arrow-left-circle')"
            iconPosition="left">Kembali</x-button>
        <x-breadcrumb :links="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Projects', 'url' => route('projects.index')],
            ['label' => 'Create'],
        ]" />
    </div>
    <ol
        class="w-full flex items-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base bg-white p-6 rounded-xl border shadow-sm">
        @foreach ($steps as $i => $step)
            <li
                class="flex md:w-full justify-center items-center {{ $currentStep >= $i + 1 ? 'text-blue-600 dark:text-blue-500' : '' }}">
                <span class="flex items-center">
                    @if ($currentStep > $i + 1)
                        {{-- Sudah selesai → tampilkan centang --}}
                        <svg class="w-4 h-4 me-2 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 1 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                    @else
                        {{-- Belum selesai → tampilkan nomor --}}
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">{{ $i + 1 }}</span>
                    @endif
                    {{ $step }}
                </span>
            </li>
        @endforeach
    </ol>
    <div class="mt-3 max-w-6xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        @if ($currentStep === 1)
            @include('livewire.projects.steps.project-detail')
        @elseif($currentStep === 2)
            @include('livewire.projects.steps.team-role')
        @elseif($currentStep === 3)
            @include('livewire.projects.steps.confirmation')
        @endif
    </div>
    <div class="w-full flex {{ $currentStep == 1 ? 'justify-end' : 'justify-between' }} gap-6 mt-6">
        @if ($currentStep > 1)
            <x-button id="prev" variant="secondary" :icon="config('icons.arrow-left-circle')" iconPosition="left"
                wire:click="prevStep">Sebelumnya</x-button>
        @endif

        @if ($currentStep < 3)
            <x-button id="next" :icon="config('icons.arrow-right-circle')" wire:click="nextStep">Berikutnya</x-button>
        @else
            <x-button id="finish" variant="success" wire:click="submit">Konfirmasi & Buat Proyek</x-button>
        @endif
    </div>
</div>
