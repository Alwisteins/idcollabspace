@props(['message', 'type' => 'success'])

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    class="{{ $type === 'error' ? 'bg-red-100 border-red-500 text-red-700' : 'bg-green-100 border-green-500 text-green-700' }} z-50 fixed top-0 right-0 mr-6 mt-4 w-1/3 p-4 border-l-4 rounded-lg shadow-md flex items-center gap-3">
    <svg class="{{ $type === 'error' ? 'text-red-500' : 'text-green-500' }} w-5 h-5" fill="currentColor"
        viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="{{ $type === 'error' ? 'M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z' : 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' }}"
            clip-rule="evenodd" />
    </svg>
    <span class="font-medium">{{ $message }}</span>
</div>
