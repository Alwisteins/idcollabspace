@props([
    'type' => 'button',
    'variant' => 'primary', // primary, secondary, danger, etc
    'icon' => null, // SVG path atau HTML icon component
    'iconPosition' => 'right', // left | right
    'wireTarget' => null,
    'href' => null,
])

@php
    $baseClass =
        'font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none focus:ring-4 transition-all duration-200';
    $variants = [
        'primary' => 'text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-300',
        'secondary' => 'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-100',
        'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-300',
        'success' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-green-300',
        'text' => 'text-gray-900 bg-none',
    ];
@endphp

@if ($href)
    <a  href="{{ $href }}"
        {{ $attributes->merge(['class' => "$baseClass " . ($variants[$variant] ?? $variants['primary'])]) }}>

        <span class="flex items-center justify-center">
            @if ($icon && $iconPosition === 'left')
                <span class="me-2">{!! $icon !!}</span>
            @endif
            {{ $slot }}
            @if ($icon && $iconPosition === 'right')
                <span class="ms-2">{!! $icon !!}</span>
            @endif
        </span>
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => "$baseClass " . ($variants[$variant] ?? $variants['primary'])]) }}>

        <span class="flex items-center justify-center">
            @if ($icon && $iconPosition === 'left')
                <span class="me-2">{!! $icon !!}</span>
            @endif
            {{ $slot }}
            @if ($icon && $iconPosition === 'right')
                <span class="ms-2">{!! $icon !!}</span>
            @endif
        </span>

        {{-- <span class="flex items-center justify-center">
        <svg class="w-4 h-4 animate-spin me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
        Loading...
    </span> --}}
    </button>
@endif
