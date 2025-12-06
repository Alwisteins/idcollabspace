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

    <div class="bg-white rounded-2xl p-6 border">
        <!-- PROJECT HEADER CARD -->
        <div class="flex justify-between mb-6">
            <div class="flex items-center gap-5">
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

            {{-- Progress Percentage --}}
            @php
                $totalLoad = $tasks->sum('load');
                $doneLoad = $tasks->where('status', 'done')->sum('load');
                $progressPercentage = $totalLoad > 0 ? round(($doneLoad / $totalLoad) * 100, 1) : 0;
            @endphp

            <div class="flex items-center gap-3">
                <div class="flex flex-col text-sm">
                    <span class="text-gray-600 font-medium">Progress</span>
                    <span class="text-xs text-gray-400 mt-0.5">
                        {{ $doneLoad }} / {{ $totalLoad }} load
                    </span>
                </div>
                <div class="relative w-16 h-16">
                    <!-- Background Circle -->
                    <svg class="w-16 h-16 transform -rotate-90">
                        <circle cx="30" cy="30" r="24" stroke="#e5e7eb" stroke-width="5" fill="none" />
                        <!-- Progress Circle -->
                        <circle cx="30" cy="30" r="24" stroke="url(#gradient)" stroke-width="5"
                            fill="none" stroke-linecap="round" stroke-dasharray="{{ 2 * 3.14159 * 24 }}"
                            stroke-dashoffset="{{ 2 * 3.14159 * 24 * (1 - $progressPercentage / 100) }}"
                            class="transition-all duration-1000 ease-out" />
                        <!-- Gradient Definition -->
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#8b5cf6;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <!-- Percentage Text -->
                    <div class="absolute inset-0 top-1 flex items-center justify-center">
                        <span class="text-md font-bold text-gray-900">
                            {{ number_format($progressPercentage, 0) }}%
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TASKBOARD SECTION -->
        <div class="mt-6">
            @include('livewire.user.projects.partials.taskboard')
        </div>
    </div>
</div>
