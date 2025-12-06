@props(['taskId', 'members', 'hasTaskAccess'])

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
                    {{ !$taskId ? 'Tambah Task Baru' : ($hasTaskAccess ? 'Edit Task' : 'Lihat Task') }}
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
                            {{-- Load --}}
                            <div class="w-full">
                                <label class="block mb-1 text-sm font-semibold text-gray-900">
                                    Load <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="taskLoad"
                                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                                @error('taskLoad')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
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
                        {{-- Assign To --}}
                        <div x-data="{
                            open: false,
                            search: '',
                            selected: @entangle('taskAssignee'),
                            toggleSelect(id) {
                                if (this.selected.includes(id)) {
                                    this.selected = this.selected.filter(x => x !== id);
                                } else {
                                    this.selected.push(id);
                                }
                            }
                        }" class="relative">
                            <label class="block mb-1 text-sm font-semibold text-gray-900">Assign To</label>

                            <!-- Input Combobox -->
                            <div @click="open = !open" class="relative">
                                <div
                                    class="w-full min-h-[48px] p-2 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer flex flex-wrap gap-1 items-center">
                                    <!-- Badge Selected Users -->
                                    <template x-if="selected.length > 0">
                                        <template x-for="id in selected" :key="id">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">
                                                <span
                                                    x-text="$refs.options.querySelector(`[data-id='${id}']`).dataset.name"></span>
                                            </span>
                                        </template>
                                    </template>

                                    <input type="text" x-model="search" placeholder="Pilih Member..."
                                        class="flex-1 bg-transparent p-1 outline-none text-sm" @input="open = true">
                                </div>
                            </div>

                            <!-- Dropdown List -->
                            <div x-show="open" @click.outside="open = false"
                                class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto">
                                <ul x-ref="options">
                                    @foreach ($members as $member)
                                        <li class="flex items-center justify-between p-2 cursor-pointer hover:bg-gray-100"
                                            data-id="{{ $member->user_id }}" data-name="{{ $member->user->name }}"
                                            @click="toggleSelect({{ $member->user_id }})">
                                            <span>{{ $member->user->name }}</span>

                                            <template x-if="selected.includes({{ $member->user_id }})">
                                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                                    stroke-width="3" viewBox="0 0 24 24">
                                                    <path d="M5 13l4 4L19 7" />
                                                </svg>
                                            </template>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @error('taskAssignee')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>
                </div>

                <!-- Footer -->

                <div class="bg-gray-50 px-6 py-4 flex {{ $taskId ? 'justify-between' : 'justify-end' }} gap-3">
                    @if ($taskId && $hasTaskAccess)
                        <x-button variant="danger" type="button" wire:click="confirmDelete">
                            Hapus Task
                        </x-button>
                    @endif
                    <div class="flex gap-3">
                        <button type="button" wire:click="closeModal"
                            class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            Batal
                        </button>

                        @if ($taskId && $hasTaskAccess)
                            <button type="submit"
                                class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Update Task
                            </button>
                        @else
                            <button type="submit"
                                class="px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Simpan Task
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
