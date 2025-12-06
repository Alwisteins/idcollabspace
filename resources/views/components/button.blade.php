@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'right',
    'iconSize' => null,
    'href' => null,
])

@php
    $baseClass = 'h-fit font-medium rounded-lg focus:outline-none focus:ring-4 transition-all duration-200';

    $variants = [
        'primary' => 'text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-300',
        'secondary' => 'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-100',
        'danger' => 'text-white bg-red-600 hover:bg-red-700 focus:ring-red-300',
        'success' => 'text-white bg-green-600 hover:bg-green-700 focus:ring-green-300',
        'info' => 'text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-300',
        'text' => 'text-gray-900 bg-none',
    ];

    // Konfigurasi size dengan text, padding, dan icon size
    $sizes = [
        'xs' => [
            'text' => 'text-xs',
            'padding' => 'px-3 py-1.5',
            'icon' => 'w-3 h-3',
        ],
        'sm' => [
            'text' => 'text-sm',
            'padding' => 'px-4 py-2',
            'icon' => 'w-3.5 h-3.5',
        ],
        'md' => [
            'text' => 'text-sm',
            'padding' => 'px-5 py-2.5',
            'icon' => 'w-4 h-4',
        ],
        'lg' => [
            'text' => 'text-base',
            'padding' => 'px-6 py-3',
            'icon' => 'w-5 h-5',
        ],
        'xl' => [
            'text' => 'text-lg',
            'padding' => 'px-8 py-4',
            'icon' => 'w-6 h-6',
        ],
    ];

    // Ambil konfigurasi size, default ke 'md'
    $sizeConfig = $sizes[$size] ?? $sizes['md'];

    // Gunakan iconSize custom atau default dari size config
    $finalIconSize = $iconSize ?? $sizeConfig['icon'];

    // Process icon dengan inject iconSize class
    $processedIcon = $icon ? preg_replace('/<svg/', '<svg class="' . $finalIconSize . '"', $icon, 1) : null;

    // Icon content untuk menghindari duplikasi
    $iconLeft =
        $processedIcon && $iconPosition === 'left'
            ? '<span class="me-2 inline-flex items-center" style="line-height: 0;">' . $processedIcon . '</span>'
            : '';

    $iconRight =
        $processedIcon && $iconPosition === 'right'
            ? '<span class="ms-2 inline-flex items-center" style="line-height: 0;">' . $processedIcon . '</span>'
            : '';

    // Merge classes - padding dan text size bisa di-override
    $classes = $attributes
        ->class([$baseClass, $variants[$variant] ?? $variants['primary'], $sizeConfig['text']])
        ->merge([
            'class' => $sizeConfig['padding'],
        ]);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $classes }}>
        <span class="flex items-center justify-center">
            {!! $iconLeft !!}
            {{ $slot }}
            {!! $iconRight !!}
        </span>
    </a>
@else
    <button type="{{ $type }}" {{ $classes }}>
        <span class="flex items-center justify-center">
            {!! $iconLeft !!}
            {{ $slot }}
            {!! $iconRight !!}
        </span>
    </button>
@endif
