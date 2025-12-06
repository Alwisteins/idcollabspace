<div class="bg-gray-100 rounded-lg p-3 h-[400px] flex flex-col">

    <div class="flex-1 overflow-y-auto space-y-2">
        @foreach ($comments as $c)
            <div class="flex items-center gap-4">
                @if ($c->user->avatar)
                    <img src="{{ $c->user->avatar }}" alt="{{ $c->user->name }}" class="w-10 h-10 rounded-full" />
                @else
                    <div class="w-10 h-10 rounded-full bg-black flex items-center justify-center">
                        <h3 class="text-lg font-bold text-gray-300">{{ strtoupper(substr($c->user->name, 0, 1)) }}</h3>
                    </div>
                @endif
                <div class="bg-white p-2 rounded-xl">
                    <strong>{{ $c->user->name }}</strong>
                    <p>{{ $c->message }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-2 flex gap-2 items-center">
        <input wire:model="newComment" class="form-input" placeholder="Tulis pesan...">
        <x-button wire:click="sendComment" size="md">
            Kirim
        </x-button>
    </div>

</div>
