<?php
$statusStyle = [
    'todo' => 'bg-red-50 text-red-800',
    'in progress' => 'bg-yellow-50 text-yellow-800',
    'done' => 'bg-green-50 text-green-800',
]; ?>

<div class="grid grid-cols-3 gap-4">
    @foreach (['todo', 'in progress', 'done'] as $status)
        <div class="{{ $statusStyle[$status] }} p-3 rounded-lg min-h-[300px] border">
            <h3 class="font-semibold mb-2 capitalize">
                {{ $status }}
            </h3>

            @foreach ($tasks->where('status', $status) as $task)
                <div wire:click="edit('{{ $task->id }}')" class="cursor-pointer p-2 mb-2 bg-white rounded shadow">
                    <div>
                        <div class="flex {{ $task->deadline ? 'justify-between' : 'justify-end' }}">
                            @if ($task->deadline)
                                <p class="text-xs text-gray-600 mb-1">Deadline:
                                    {{ $task->deadline->translatedFormat('d F Y') }}</p>
                            @endif
                            <span
                                class="flex items-center gap-1 text-xs font-medium {{ $this->loadStyle($task->load) }}">
                                <x-icon name="ticket" class="w-4" />
                                {{ $task->load }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm">{{ $task->title }}</p>
                        </div>
                        @if ($task->assignees->first())
                            <div class="flex items-center gap-2 my-1">
                                @foreach ($task->assignees as $assignee)
                                    <div class="flex items-end gap-1">
                                        @if ($assignee->avatar)
                                            <img class="w-4 h-4 rounded-full" src="{{ $assignee->avatar }}"
                                                alt="">
                                        @else
                                            <div
                                                class="w-4 h-4 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                                <h3 class="text-xs font-bold text-white">
                                                    {{ strtoupper(substr($assignee->name, 0, 1)) }}
                                                </h3>
                                            </div>
                                        @endif
                                        <p class="text-xs text-gray-600 mt-1">
                                            {{ $assignee->name }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if ($task->description)
                            <p class="text-xs text-gray-600">{{ $task->description }}</p>
                        @endif
                    </div>
                    <div class="mt-2 flex {{ $task->status === 'in progress' ? 'justify-between' : 'justify-end' }}">
                        @if ($task->status !== 'todo' && (Auth::id() === $task->project->owner_id || $task->assignees->contains(Auth::id())))
                            <x-button size="xs" variant="text" :icon="config('icons.chevron-left')" iconPosition="left"
                                wire:click.stop="updateTaskStatus({{ $task->id }}, 'previous')">
                                prev
                            </x-button>
                        @endif
                        @if ($task->status !== 'done' && (Auth::id() === $task->project->owner_id || $task->assignees->contains(Auth::id())))
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
        <x-task-modal :members="$members" :taskId="$taskId" :hasTaskAccess="$hasTaskAccess" />
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
