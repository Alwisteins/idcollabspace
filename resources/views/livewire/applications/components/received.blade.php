<div class="mt-10">
    @if ($applicationsReceived->isEmpty())
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-gray-600 text-sm">Belum ada lamaran yang masuk saat ini.</p>
        </div>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($applicationsReceived as $application)
                <div
                    class="group relative bg-white dark:bg-gray-900 w-full rounded-2xl p-6 border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-xl transition duration-300 ease-in-out">

                    {{-- Header Info --}}
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $application->created_at->diffForHumans() }}
                        </span>
                        <span
                            class="{{ $this->getStatusColor($application->status) }} px-3 py-1 text-xs font-semibold rounded-full">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>

                    {{-- Project Identity --}}
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md text-white font-bold text-lg">
                            {{ strtoupper(substr($application->title, 0, 1)) }}
                        </div>
                        <div>
                            <h3
                                class="text-base font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 transition">
                                {{ $application->title }}
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Lamaran proyek</p>
                        </div>
                    </div>

                    {{-- Status Summary --}}
                    <div class="grid grid-cols-3 gap-2 mt-4 text-center">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg py-2">
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Pending</p>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-100">
                                {{ $application->applications->where('status', 'pending')->count() }}
                            </p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg py-2">
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Rejected</p>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-100">
                                {{ $application->applications->where('status', 'rejected')->count() }}
                            </p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg py-2">
                            <p class="text-[11px] text-gray-500 dark:text-gray-400">Accepted</p>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-100">
                                {{ $application->applications->where('status', 'accepted')->count() }}
                            </p>
                        </div>
                    </div>

                    {{-- Roles Dibutuhkan --}}
                    <div class="mt-5">
                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 mb-2">Roles Dibutuhkan:</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($application->roles as $projectRole)
                                <span
                                    class="px-3 py-1 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-400 text-xs font-medium rounded-full">
                                    {{ $projectRole->role->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex justify-between mt-6">
                        <a wire:navigate href="{{ route('projects.show', $application->id) }}"
                            class="text-xs px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-200 transition">
                            Detail Proyek
                        </a>
                        <a wire:navigate href="{{ route('applications.byProject', $application->id) }}"
                            class="text-xs px-4 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-900 transition">
                            Lihat Lamaran <span
                                class="ml-1 rounded-full px-2 py-1 text-xs {{ request()->type == 'received' ? 'text-gray-800 bg-white' : 'text-gray-500 bg-gray-100' }}">{{ $application->applications->count() }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
