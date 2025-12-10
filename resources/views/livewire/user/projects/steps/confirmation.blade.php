<div>
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Konfirmasi Detail Proyek</h2>
    {{-- Bagian 1: Informasi Proyek --}}
    <div class="flex justify-between items-start gap-4 p-4 rounded-xl bg-black border">
        <div>
            <div class="flex items-center gap-4">
                <div>
                    <h1 class="text-lg font-medium text-white">{{ $title }}</h1>
                    <div class="text-sm text-gray-500 mt-1">
                        <span
                            class="px-2 py-1 rounded-md text-xs font-semibold {{ $statusColor }}">{{ $status }}</span>
                        <span
                            class="mx-2 px-2 py-1 rounded-md text-xs font-semibold bg-blue-100 text-blue-600">{{ $categories->find($category_id)->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </div>

            <p class="mt-4 text-gray-300 text-sm">{{ $description }}</p>

            <div class="mt-5 flex flex-wrap gap-4 text-sm text-gray-300">
                <div class="flex items-center gap-2">
                    <span class="font-semibold">💰 Tipe Proyek:</span>
                    <span class="{{ $is_paid ? 'text-green-600 font-medium' : 'text-gray-300' }}">
                        {{ $is_paid ? 'Berbayar' : 'Non-Bayar / Volunteer' }}
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-semibold">🗓️ Timeline:</span>
                    @if ($start_date && $end_date)
                        <span>{{ \Carbon\Carbon::parse($start_date)->format('d M Y') }}
                            - {{ \Carbon\Carbon::parse($end_date)->format('d M Y') }}</span>
                    @else
                        <span class="text-gray-500">Belum ditentukan</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- End Bagian 1 --}}

    {{-- Bagian 2: Role Tim --}}
    <div class="my-6">
        <h3 class="text-lg font-medium text-gray-700 mb-2">👥 Role yang Dibutuhkan</h3>

        @if (!empty($selectedRoles))
            <div class="divide-y divide-gray-200">
                @foreach ($selectedRoles as $index => $role)
                    <div class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $role['name'] }}</p>
                        </div>
                        <span class="text-gray-600 text-sm">
                            Kuota: {{ $role['count'] ?? 1 }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Belum ada role yang dipilih.</p>
        @endif
    </div>
    {{-- End Bagian 2 --}}
</div>
