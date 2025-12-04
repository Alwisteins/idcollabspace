<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <x-button wire:navigate href="{{ route('projects.show', $project) }}" :icon="config('icons.arrow-left-circle')" iconPosition="left">
            Kembali
        </x-button>

        <x-breadcrumb :links="[
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Projects', 'url' => route('projects.index')],
            ['label' => 'Detail', 'url' => route('projects.show', $project)],
            ['label' => 'Workspace'],
        ]" />
    </div>

    <!-- PROJECT HEADER CARD -->
    <div class="flex items-center gap-5 p-6 bg-white rounded-2xl shadow-md border border-gray-100 mb-6">
        <!-- Avatar -->
        <div
            class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600
            flex items-center justify-center text-white font-bold text-xl shadow-sm">
            @if ($project->owner && $project->owner->name)
                {{ strtoupper(substr($project->owner->name, 0, 1)) }}
            @endif
        </div>

        <!-- Title & Meta -->
        <div class="flex flex-col">
            <h2 class="text-xl font-semibold text-gray-900 leading-tight">
                {{ $project->title }}
            </h2>

            <div class="flex items-center gap-2 text-sm mt-1">
                <span class="font-medium text-gray-700">🗓️ Timeline:</span>

                @if ($project->start_date && $project->end_date)
                    <span class="text-gray-800">
                        {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}
                        —
                        {{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}
                    </span>
                @else
                    <span class="text-gray-500 italic">Belum ditentukan</span>
                @endif
            </div>
        </div>
    </div>

    <!-- TASKBOARD SECTION -->
    <div class="mt-6">
        @include('livewire.user.projects.partials.taskboard')
    </div>
</div>
