<div class="mt-8">
    @if ($applicationsSent->isEmpty())
        <div class="flex flex-col items-center justify-center py-20 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-gray-600 text-sm">Belum ada lamaran yang dikirim saat ini.</p>
        </div>
    @else
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($applicationsSent as $application)
                <div x-data="{ showMessageModal: false }" class="bg-white w-full rounded-2xl p-6 border">
                    <!-- Header -->
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">{{ $application->created_at->diffForHumans() }}</span>
                        <span
                            class="px-3 py-1 {{ $this->getStatusColor($application->status) }} text-xs font-semibold rounded-md">
                            {{ $application->status }}
                        </span>
                    </div>
                    <div class="flex items-center gap-3 mt-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-sm">
                            <h3 class="text-2xl font-bold text-white">
                                {{ strtoupper(substr($application->project->title, 0, 1)) }}</h3>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $application->project->title }}
                            </h3>
                            <p class="text-sm text-gray-600">{{ $application->projectRole->role->name }}</p>

                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <button @click="showMessageModal = true" class="text-xs px-4 py-2 rounded-md border">Lihat
                            Pesan</button>
                        <a wire:navigate href="{{ route('projects.show', $application->project->id) }}"
                            class="text-xs px-4 py-2 rounded-md bg-gray-800 text-white">Lihat
                            Proyek</a>
                    </div>

                    <div x-show="showMessageModal" class="fixed inset-0 z-50 flex items-center justify-center">
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="showMessageModal = false">
                        </div>

                        <!-- Modal Card -->
                        <div
                            class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 z-10 border border-gray-100">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-700 mb-1">Pesan Lamaran</h4>
                                <p
                                    class="text-gray-700 bg-gray-50 border border-gray-100 rounded-lg p-3 leading-relaxed text-sm">
                                    {{ $application->message ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
