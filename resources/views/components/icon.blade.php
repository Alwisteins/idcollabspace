@props(['name', 'class' => 'w-5 h-5'])

@php
    $icons = [
        'plus' => 'M12 4v16m8-8H4',
        'edit' =>
            'm16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125',
        'trash' =>
            'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16',
        'close' => 'M6 18L18 6M6 6l12 12',
    ];
@endphp

<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
    {{ $attributes->merge(['class' => $class]) }}>
    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$name] ?? '' }}" />
</svg>
