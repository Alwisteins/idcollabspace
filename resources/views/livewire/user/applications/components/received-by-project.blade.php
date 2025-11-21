<div class="p-6">
    <div class="flex justify-between items-center">
        <x-button wire:navigate wireTarget="kembali" href="{{ route('applications.index', ['type' => 'received']) }}"
            :icon="config('icons.arrow-left-circle')" iconPosition="left">Kembali</x-button>
        <x-breadcrumb :links="[
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Applications', 'url' => route('applications.index', ['type' => 'received'])],
            ['label' => 'Detail'],
        ]" />
    </div>
    <div class="flex justify-between items-center my-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">{{ $project->title }}</h2>
            <p class="text-sm text-gray-500">Total Lamaran: {{ $project->applications->count() }}</p>
        </div>
    </div>

    @if ($project->applications->isEmpty())
        <p class="text-center text-gray-500 py-10">Belum ada pelamar untuk proyek ini.</p>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($project->applications as $application)
                <div class="bg-white border rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs text-gray-400">{{ $application->created_at->diffForHumans() }}</span>
                        <span
                            class="px-2.5 py-1 rounded-md text-xs font-semibold {{ $this->getStatusColor($application->status) }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>

                    <div class="flex items-center gap-3 mb-4">
                        @if ($application->user->avatar)
                            <img src="{{ $application->user->avatar }}"
                                class="w-12 h-12 rounded-md object-cover shadow-sm" alt="avatar">
                        @else
                            <div
                                class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                <span class="text-lg font-bold text-white">
                                    {{ strtoupper(substr($application->user->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $application->user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $application->user->location ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="text-sm text-gray-700 mb-3">
                        <strong>Posisi:</strong> {{ $application->projectRole->role->name }}
                    </div>
                    <div class="text-sm bg-gray-100 rounded-md p-2 text-gray-600 mb-4">
                        <p>{{ $application->message ? Str::limit($application->message, 90) : 'Tidak ada pesan.' }}
                        </p>
                    </div>


                    <div x-data="{ showMessageModal: false }" class="flex items-center justify-end gap-2">
                        <button @click="showMessageModal = true" class="text-xs px-4 py-2 rounded-md border">Lihat
                            Pesan</button>
                        @if ($application->status === 'pending')
                            <button wire:click="rejectApplication({{ $application->id }})"
                                class="text-xs px-4 py-2 rounded-md border border-red-200 text-red-600 hover:bg-red-50 transition">
                                Tolak
                            </button>
                            <button wire:click="acceptApplication({{ $application->id }})"
                                class="text-xs px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Terima
                            </button>
                        @else
                            <p class="text-xs text-gray-400 italic text-right">Lamaran ini sudah
                                {{ $application->status }}.</p>
                        @endif

                        <div x-show="showMessageModal" class="fixed inset-0 z-50 flex items-center justify-center">
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
                                @click="showMessageModal = false">
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

                </div>
            @endforeach
        </div>
    @endif
</div>
