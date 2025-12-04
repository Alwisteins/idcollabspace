<div class="grid grid-cols-3 gap-4">
    @foreach (['todo', 'in progress', 'done'] as $status)
        <div class="bg-gray-50 p-3 rounded-lg min-h-[300px]">
            <h3 class="font-semibold mb-2 capitalize">
                {{ $status }}
            </h3>

            @foreach ($tasks->where('status', $status) as $task)
                <div wire:click="edit('{{ $task->id }}')" class="cursor-pointer p-2 mb-2 bg-white rounded shadow">
                    <div>
                        @if ($task->deadline)
                            <p class="text-xs text-gray-600 mb-1">Deadline:
                                {{ $task->deadline->translatedFormat('d F Y') }}</p>
                        @endif
                        <div>
                            <p class="text-sm">{{ $task->title }}</p>
                        </div>
                        @if ($task->user_id)
                            <div class="flex items-center gap-1 my-1">
                                @if ($task->assignees->first()->avatar)
                                    <img class="w-4 h-4 rounded-full" src="{{ $task->assignees->first()->avatar }}"
                                        alt="">
                                @else
                                    <div
                                        class="w-4 h-4 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                        <h3 class="text-xs font-bold text-white">
                                            {{ strtoupper(substr($task->assignees->first()->name, 0, 1)) }}
                                        </h3>
                                    </div>
                                @endif
                                <p class="text-xs text-gray-600 mt-1">
                                    {{ $task->assignees->first()->name }}
                                </p>
                            </div>
                        @endif
                        @if ($task->description)
                            <p class="text-xs text-gray-600">{{ $task->description }}</p>
                        @endif
                    </div>
                    <div class="mt-2 flex {{ $task->status === 'in progress' ? 'justify-between' : 'justify-end' }}">
                        @if ($task->status !== 'todo')
                            <x-button size="xs" variant="text" :icon="config('icons.chevron-left')" iconPosition="left"
                                wire:click.stop="updateTaskStatus({{ $task->id }}, 'previous')">
                                prev
                            </x-button>
                        @endif
                        @if ($task->status !== 'done')
                            <x-button size="xs" variant="text" :icon="config('icons.chevron-right')" iconPosition="right"
                                wire:click.stop="updateTaskStatus({{ $task->id }}, 'next')">
                                next
                            </x-button>
                        @endif
                    </div>
                </div>
            @endforeach

            <!-- Modal toggle -->
            <x-button wire:click="openModal('{{ $status }}')">+ Add Task</x-button>
        </div>
    @endforeach
    @if ($showModal)
        <x-task-modal :members="$members" :taskId="$taskId" />
    @endif
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('confirm-delete-task', ({
                taskId
            }) => {
                Swal.fire({
                    title: "Yakin hapus?",
                    text: "Task akan dihapus permanen!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete-task', {
                            taskId
                        });
                    }
                });
            });
        });
    </script>
</div>
