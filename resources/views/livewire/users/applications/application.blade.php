<div class="p-6">
    <div>
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                <a href="/applications?type=received" wire:navigate
                    class="inline-block px-4 py-3 {{ request()->type == 'received' ? 'text-white bg-blue-600 active' : ' hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }} rounded-lg"
                    aria-current="page">
                    Lamaran Masuk
                    <span
                        class="ml-1 rounded-full px-2 py-1 text-xs {{ request()->type == 'received' ? 'text-blue-600 bg-white' : 'text-gray-500 bg-gray-100' }}">{{ $applicationsReceived->pluck('applications')->flatten()->count() }}</span>
                </a>
            </li>
            <li class="me-2">
                <a href="/applications?type=sent"
                    class="inline-block px-4 py-3 rounded-lg {{ request()->type == 'sent' ? 'text-white bg-blue-600 active' : ' hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                    Lamaran Dikirim
                    <span
                        class="ml-1 rounded-full px-2 py-1 text-xs {{ request()->type == 'sent' ? 'text-blue-600 bg-white' : 'text-gray-500 bg-gray-100' }}">{{ $applicationsSent->count() }}</span>
                </a>
            </li>
        </ul>
    </div>

    @if (request()->type == 'sent')
        @include('livewire.applications.components.sent')
    @elseif (request()->type == 'received')
        @include('livewire.applications.components.received')
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
</div>
