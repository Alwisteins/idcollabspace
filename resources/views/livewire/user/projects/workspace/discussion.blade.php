<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <x-button wire:navigate href="{{ route('projects.workspace.task', $project) }}" :icon="config('icons.arrow-left-circle')"
            iconPosition="left">
            Kembali
        </x-button>

        <x-breadcrumb :links="[
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Projects', 'url' => route('projects.index')],
            ['label' => 'Detail', 'url' => route('projects.show', $project)],
            ['label' => 'Workspace'],
        ]" />
    </div>

    <ul
        class="bg-white p-2 flex flex-wrap w-fit relative top-1 rounded-t-lg border-t border-x text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <button onclick="window.location.href = '{{ route('projects.workspace.task', $project) }}';"
                class="inline-block px-4 py-3 rounded-lg">
                Tasks
            </button>
        </li>
        <li class="me-2 w-fit">
            <button onclick="window.location.href = '{{ route('projects.workspace.discussion', $project) }}';"
                class="inline-block px-4 py-3 rounded-lg {{ url()->current() == route('projects.workspace.discussion', $project) ? 'text-white bg-blue-600 active' : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                Discussions
            </button>
        </li>
    </ul>
    <div class="bg-white rounded-tl-none rounded-2xl border p-6">
        <div class="flex justify-between mb-6">
            <div class="flex items-center gap-5">
                <div
                    class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600
            flex items-center justify-center text-white font-bold text-xl shadow-sm">
                    @if ($project->owner && $project->owner->name)
                        {{ strtoupper(substr($project->owner->name, 0, 1)) }}
                    @endif
                </div>

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
        </div>

        <div class="mt-6">
            @include('livewire.user.projects.partials.discussion')
        </div>
    </div>
</div>
