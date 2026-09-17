@props(['status'])

@php
    $classes = match($status) {
        'Aktif', 'active' => 'bg-green-100 text-green-800 border-green-200',
        'Non-Aktif', 'non-aktif', 'inactive' => 'bg-red-100 text-red-800 border-red-200',
        default => 'bg-gray-100 text-gray-800 border-gray-200',
    };
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $classes }}">
    {{ ($status) }}
</span>