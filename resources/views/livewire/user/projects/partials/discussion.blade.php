<div class="bg-white border rounded p-3 h-[400px] flex flex-col">

    <div class="flex-1 overflow-y-auto space-y-2">
        @foreach ($comments as $c)
            <div class="bg-gray-100 p-2 rounded">
                <strong>{{ $c->user->name }}</strong>
                <p>{{ $c->message }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-2">
        <input wire:model="newComment" class="w-full border rounded" placeholder="Tulis pesan...">
        <button wire:click="sendComment" class="mt-1 bg-blue-600 text-white px-3 py-1 rounded">
            Kirim
        </button>
    </div>

</div>
