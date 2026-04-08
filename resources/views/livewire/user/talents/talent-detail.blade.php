<div class="p-6">
    <div class="flex justify-between items-center">
        <x-button wire:navigate @click="history.back()" :icon="config('icons.arrow-left-circle')" iconPosition="left">Kembali</x-button>
        <x-breadcrumb :links="[
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Talents', 'url' => route('talents.index')],
            ['label' => 'Detail'],
        ]" />
    </div>
    <div class="bg-white mt-6 rounded-2xl p-6 border border-gray-200">
        {{-- Header & Meta --}}
        <div class="flex items-center gap-4">
            @if ($talent->avatar)
                <img src="{{ $talent->avatar }}" alt="{{ $talent->name }}" class="w-16 h-16 rounded-full" />
            @else
                <div
                    class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                    <h3 class="text-2xl font-bold text-white">{{ strtoupper(substr($talent->name, 0, 1)) }}</h3>
                </div>
            @endif
            <div>
                <h3 class="text-lg font-bold text-gray-900 mt-1">{{ $talent->name }}</h3>
                <p class="text-sm text-gray-600">{{ $talent->location }}</p>
            </div>
        </div>

        {{-- Roles --}}
        <div class="gap-2 my-4">
            @foreach ($talent->roles as $role)
                <span class="px-2 py-1 rounded-md text-xs text-blue-600 bg-blue-100">{{ $role->name }}</span>
            @endforeach
        </div>

        {{-- Description --}}
        <div class="bg-gray-100 rounded-lg p-3">
            <p class="text-sm text-gray-700">{{ $talent->description ?? 'Belum ada deskripsi.' }}</p>
        </div>

        {{-- Owned Projects --}}
        <div id="roles" class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Project Dimiliki</h3>
                <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
            </div>

            @if ($ownedProjects->isNotEmpty())
                <div class="space-y-4">
                    @foreach ($ownedProjects as $project)
                        <div class="border rounded-xl p-4 hover:shadow-sm transition bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-md font-semibold text-gray-900">
                                    <a href="{{ route('projects.show', $project->id) }}" class="hover:underline">
                                        {{ $project->title }}
                                    </a>
                                </h4>
                                <span
                                    class="px-3 py-1 {{ $this->getStatusColor($project['status']) }} text-xs font-semibold rounded-md">
                                    {{ $project['status'] }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 line-clamp-2">
                                {{ $project->description ?? 'Tidak ada deskripsi project.' }}
                            </p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-xs text-gray-500">
                                    {{ $project->created_at->diffForHumans() }}
                                </span>
                                @if ($project->category)
                                    <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded-md">
                                        {{ $project->category->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500 italic">Belum ada project yang diikuti atau dibuat.</p>
            @endif
        </div>

        {{-- Joined Projects --}}
        <div id="roles" class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Kontribusi Terbaru</h3>
                <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
            </div>

            @if ($joinedProjects->isNotEmpty())
                <div class="space-y-4">
                    @foreach ($joinedProjects as $project)
                        <div class="border rounded-xl p-4 hover:shadow-sm transition bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-md font-semibold text-gray-900">
                                    <a href="{{ route('projects.show', $project->id) }}" class="hover:underline">
                                        {{ $project->title }}
                                    </a>
                                </h4>
                                <span
                                    class="px-3 py-1 {{ $this->getStatusColor($project['status']) }} text-xs font-semibold rounded-md">
                                    {{ $project['status'] }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 line-clamp-2">
                                {{ $project->description ?? 'Tidak ada deskripsi project.' }}
                            </p>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-xs text-gray-500">
                                    {{ $project->created_at->diffForHumans() }}
                                </span>
                                @if ($project->category)
                                    <span class="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded-md">
                                        {{ $project->category->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-gray-500 italic">Belum ada project yang diikuti atau dibuat.</p>
            @endif
        </div>
    </div>
</div>
