@if ($paginator->hasPages())
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-b-lg">
        <!-- Mobile View -->
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400">
                    Previous
                </span>
            @else
                <button wire:click="previousPage"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Previous
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Next
                </button>
            @else
                <span
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400">
                    Next
                </span>
            @endif
        </div>

        <!-- Desktop View -->
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm gap-1" aria-label="Pagination">
                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <span
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 bg-gray-100 border border-gray-300">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <button wire:click="previousPage"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-700 bg-white border border-gray-300 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-md">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span
                                        class="relative z-10 inline-flex items-center bg-blue-600 border border-blue-600 px-4 py-2 text-sm font-semibold text-white rounded-md shadow-sm">{{ $page }}</span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 bg-white border border-gray-300 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600 rounded-md">{{ $page }}</button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-700 bg-white border border-gray-300 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-600">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <span
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 bg-gray-100 border border-gray-300">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
@endif
