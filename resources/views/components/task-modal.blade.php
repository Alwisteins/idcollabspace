@props(['taskId', 'members'])

<div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
    x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak>

    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" x-show="show"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" wire:click="closeModal">
    </div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl"
            x-show="show" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            @click.away="$wire.closeModal()">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4 flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">
                    {{ $taskId ? 'Edit Task' : 'Tambah Task Baru' }}
                </h3>
                <button type="button" wire:click="closeModal"
                    class="text-white hover:text-gray-200 rounded-lg w-8 h-8 flex justify-center items-center transition">
                    ✕
                </button>
            </div>

            <!-- Body -->
            <form wire:submit.prevent="storeTask">
                <div class="bg-white px-6 py-6 flex justify-between items-start gap-6">
                    <div class="w-full space-y-4">
                        {{-- Title --}}
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-900">
                                Judul Task <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="taskTitle"
                                class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: Desain halaman dashboard" required>
                            @error('taskTitle')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-900">Deskripsi</label>
                            <textarea wire:model="taskDescription" rows="3"
                                class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Tambahkan detail mengenai task..."></textarea>
                            @error('taskDescription')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full space-y-4">
                        <div class="flex justify-between gap-2">
                            {{-- Status --}}
                            <div class="w-full">
                                <label class="block mb-1 text-sm font-semibold text-gray-900">Status</label>
                                <select wire:model="taskStatus"
                                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="todo">To Do</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="done">Done</option>
                                </select>
                                @error('taskStatus')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Deadline --}}
                            <div class="w-full">
                                <label class="block mb-1 text-sm font-semibold text-gray-900">Deadline</label>
                                <input type="date" wire:model="taskDeadline"
                                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                @error('taskDeadline')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- Assign To --}}
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-900">Assign To</label>
                            <select wire:model="taskAssignee"
                                class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="0">-- Pilih Member --</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->user_id }}">
                                        {{ $member->user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('taskAssignee')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Footer -->

                <div class="bg-gray-50 px-6 py-4 flex {{ $taskId ? 'justify-between' : 'justify-end' }} gap-3">
                    @if ($taskId)
                        <x-button variant="danger" type="button" wire:click="confirmDelete">
                            Hapus Task
                        </x-button>
                    @endif
                    <div class="flex gap-3">
                        <button type="button" wire:click="closeModal"
                            class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            {{ $taskId ? 'Update Task' : 'Simpan Task' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
