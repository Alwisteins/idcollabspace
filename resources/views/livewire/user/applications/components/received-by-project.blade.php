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
                <a href="{{ route('talents.show', $application->user->id) }}"
                    class="bg-white cursor-pointer border rounded-2xl p-5 shadow-sm hover:shadow-md transition">
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

                    <div
                        class="flex items-center gap-2 {{ $application->status === 'pending' ? 'justify-end' : 'justify-between' }}">
                        <button @click="$dispatch('open-modal-{{ $application->id }}')" type="button"
                            class="text-xs px-4 py-2 w-fit rounded-md border hover:bg-gray-50 transition">
                            Lihat Pesan
                        </button>
                        @if ($application->status === 'pending')
                            <button wire:click.prevent="rejectApplication({{ $application->id }})"
                                class="text-xs px-4 py-2 rounded-md border border-red-200 text-red-600 hover:bg-red-50 transition">
                                Tolak
                            </button>
                            <button wire:click.prevent="acceptApplication({{ $application->id }})"
                                class="text-xs px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                                Terima
                            </button>
                        @else
                            <p class="text-xs text-gray-400 italic text-right w-1/2">Lamaran ini sudah
                                {{ $application->status }}.</p>
                        @endif

                        <div x-data="{ show: false }" @open-modal-{{ $application->id }}.window="show = true"
                            x-show="show" x-cloak style="display: none;"
                            class="fixed inset-0 z-50 flex items-center justify-center">

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="show = false">
                            </div>

                            <!-- Modal Card -->
                            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 z-10 border border-gray-100"
                                @click.stop>
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="text-lg font-semibold text-gray-800">Pesan Lamaran</h4>
                                    <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div
                                    class="text-gray-700 bg-gray-50 border border-gray-100 rounded-lg p-4 leading-relaxed text-sm max-h-96 overflow-y-auto">
                                    {{ $application->message ?? 'Tidak ada pesan.' }}
                                </div>
                            </div>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>
    @endif
</div>
