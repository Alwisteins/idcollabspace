<div>
    <div class="grid md:grid-cols-2 gap-8 p-12">
        @foreach ($projects as $project)
            <div wire:navigate href="{{ route('projects.show', $project['id']) }}"
                class="bg-white rounded-2xl p-6 hover:cursor-pointer hover:shadow-xl transition-all border border-gray-200 group hover:-translate-y-1">
                <div class="flex justify-end">
                    <span
                        class="px-3 py-1 {{ $this->getStatusColor($project['status']) }} text-xs font-semibold rounded-md">
                        {{ $project['status'] }}
                    </span>
                </div>
                <div class="flex items-center gap-4 my-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition">
                        {{ $project['title'] }}
                    </h3>
                </div>
                <p class="text-xs text-gray-600">{{ $project['description'] }}</p>

                <!-- Roles Section -->
                <div class="mt-3 pt-3 border-t border-gray-300">
                    <div class="text-xs font-semibold text-gray-500 mb-2">Roles Dibutuhkan:</div>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project->roles as $projectRole)
                            <span class="px-3 py-1 bg-stone-100 text-gray-700 text-xs font-medium rounded-full">
                                {{ $projectRole->role->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
