<div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
        @foreach ($talents as $talent)
            <div wire:navigate href="{{ route('talents.show', $talent['id']) }}"
                class="bg-white flex flex-col rounded-2xl p-6 hover:shadow-xl transition-all border border-gray-200 group cursor-pointer hover:-translate-y-2">
                <div class="flex items-center gap-4">
                    @if ($talent->avatar)
                        <img src="{{ $talent->avatar }}" alt="{{ $talent->name }}" class="w-16 h-16 rounded-full" />
                    @else
                        <div
                            class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                            <h3 class="text-2xl font-bold text-white">{{ strtoupper(substr($talent->name, 0, 1)) }}</h3>
                        </div>
                    @endif
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mt-1">{{ $talent['name'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $talent['location'] }}</p>
                    </div>
                </div>
                <div class="gap-2 my-4">
                    @foreach ($talent->roles as $role)
                        <span class="px-2 py-1 rounded-md text-xs text-blue-600 bg-blue-100">{{ $role->name }}</span>
                    @endforeach
                </div>
                <div class="bg-gray-100 rounded-lg flex-1 flex items-star p-2">
                    <p class="text-sm text-gray-600">
                        {{ strlen($talent['description']) > 100 ? substr($talent['description'], 0, 100) . '...' : $talent['description'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $talents->links() }}
    </div>
</div>
