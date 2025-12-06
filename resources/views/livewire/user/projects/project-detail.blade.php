<div class="p-6">
    <div class="flex justify-between items-center">
        <x-button wire:navigate href="{{ route('projects.index') }}" :icon="config('icons.arrow-left-circle')"
            iconPosition="left">Kembali</x-button>
        <x-breadcrumb :links="[
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Projects', 'url' => route('projects.index')],
            ['label' => 'Detail'],
        ]" />
    </div>
    <div class="max-w-6xl mt-6 mx-auto bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        {{-- Header & Meta --}}
        <div class="rounded-xl border">
            @if (auth()->id() === $project->owner_id)
                <div
                    class="p-4 border rounded-t-lg bg-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-3">

                    {{-- Dropdown Status --}}
                    <div class="flex items-center gap-3">
                        <label class="text-sm font-semibold text-gray-700">Status Proyek:</label>
                        <select wire:change="updateStatus($event.target.value)"
                            class="w-40 px-3 py-2 text-sm rounded-lg border border-gray-300 bg-white text-gray-700 
         focus:ring-2 focus:ring-blue-500 shadow-sm transition cursor-pointer">
                            <option value="open" {{ $project->status === 'open' ? 'selected' : '' }}>Open
                            </option>
                            <option value="in progress" {{ $project->status === 'in progress' ? 'selected' : '' }}>
                                In
                                Progress</option>
                            <option value="completed" {{ $project->status === 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                    </div>

                    {{-- Tutup Recruitment --}}
                    @if ($project->status === 'open')
                        <button wire:click="closeRecruitment"
                            class="px-4 py-2 text-sm rounded-lg bg-yellow-100 text-yellow-800 font-medium hover:bg-yellow-200 
     border border-yellow-200 flex items-center gap-2 transition">
                            <x-icon name="lock" class="w-4" />
                            Tutup Recruitment
                        </button>
                    @endif

                </div>
            @endif
            <div class="p-4 flex justify-between items-start gap-4">
                {{-- Project Header --}}
                <div>
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold text-lg">
                            @if ($project->owner && $project->owner->name)
                                {{ strtoupper(substr($project->owner->name, 0, 1)) }}
                            @endif
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $project->title }}</h1>
                            <div class="text-sm text-gray-500 mt-1">
                                <span
                                    class="px-2 py-1 rounded-md text-xs font-semibold {{ $statusColor }}">{{ $project->status }}</span>
                                <span
                                    class="mx-2 px-2 py-1 rounded-md text-xs font-semibold bg-blue-100 text-blue-600">{{ $project->category?->name ?? 'Uncategorized' }}</span>
                                <span>dibuat {{ $project->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-700 text-sm">{{ $project->description }}</p>

                    {{-- Project Info: Payment & Timeline --}}
                    <div class="mt-5 flex flex-wrap gap-4 text-sm text-gray-700">
                        <div class="flex items-center gap-2">
                            <span class="font-semibold">💰 Tipe Proyek:</span>
                            <span class="{{ $project->is_paid ? 'text-green-600 font-medium' : 'text-gray-500' }}">
                                {{ $project->is_paid ? 'Berbayar' : 'Non-Bayar / Volunteer' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold">🗓️ Timeline:</span>
                            @if ($project->start_date && $project->end_date)
                                <span>{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}
                                    - {{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}</span>
                            @else
                                <span class="text-gray-500">Belum ditentukan</span>
                            @endif
                        </div>
                    </div>

                    {{-- PRIMARY ACTION BUTTONS --}}
                    <div class="mt-6 flex flex-col sm:flex-row gap-3">
                        @php
                            $userIsMember = $project->members->contains('user_id', auth()->id());
                            $userIsOwner = auth()->id() === $project->owner_id;
                        @endphp
                        {{-- Workspace Button --}}
                        @if ($userIsOwner || $userIsMember)
                            <x-button wire:navigate href="{{ route('projects.workspace.task', $project) }}"
                                class="!bg-indigo-600 hover:!bg-indigo-700 !text-white shadow-sm w-full sm:w-auto">
                                Masuk Workspace
                            </x-button>
                        @endif

                        {{-- Edit & Delete --}}
                        @if (auth()->id() === $project->owner_id)
                            <x-button variant="success" wire:navigate href="{{ route('projects.edit', $project) }}"
                                class="w-full sm:w-auto">
                                Edit Project
                            </x-button>

                            <x-button variant="danger" wire:click="delete({{ $project->id }})"
                                class="w-full sm:w-auto">
                                Hapus Project
                            </x-button>
                        @endif
                        @php $userApplied = $project->applications->where('user_id', auth()->id())->count() > 0; @endphp
                        {{-- Already Applied Badge --}}
                        @if ($userApplied)
                            <span
                                class="px-4 py-2 bg-yellow-50 text-yellow-700 rounded-lg border border-yellow-200 text-center w-full sm:w-fit">
                                Kamu sudah melamar
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Owner Card --}}
                <div>
                    <h4 class="text-md font-semibold text-gray-800">Dibuat Oleh</h4>
                    <div class="w-64 mt-3">
                        <div class="flex items-center gap-1 bg-stone-100 p-2 border rounded-lg">
                            @if ($project->owner?->avatar)
                                <img src="{{ $project->owner?->avatar }}" alt="{{ $project->owner?->name }}"
                                    class="w-6 h-6 rounded-full" />
                            @else
                                <div
                                    class="w-6 h-6 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                    <h3 class="text-2xl font-bold text-white">
                                        {{ strtoupper(substr($project->owner?->name, 0, 1)) }}
                                    </h3>
                                </div>
                            @endif
                            <div>
                                <div class="font-semibold text-sm">{{ $project->owner?->name ?? '—' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Roles Section --}}
        <div id="roles" class="mt-6 pt-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Roles Dibutuhkan</h3>
                <div class="text-sm text-gray-500">#{{ $project->roles->count() }} roles</div>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($project->roles as $pr)
                    @php
                        $filled = $pr->members ? $pr->members->count() : 0;
                    @endphp
                    <div class="p-4 border rounded-xl flex justify-between items-center">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="font-semibold">{{ $pr->role->name }}</div>
                                <div class="text-xs text-gray-500">• {{ $filled }}/{{ $pr->quantity ?? '∞' }}
                                    terisi</div>
                            </div>
                            @if ($pr->description)
                                <div class="text-xs text-gray-500 mt-2">{{ Str::limit($pr->description, 140) }}</div>
                            @endif
                        </div>

                        <div class="flex flex-col items-end gap-2">
                            @php
                                $roleApplicant = $project->applications->firstWhere('project_role_id', $pr->id);
                                $appliedForThis = $roleApplicant && $roleApplicant->user_id == auth()->id();
                            @endphp

                            @if (auth()->id() !== $project->owner_id)
                                @if ($appliedForThis && $roleApplicant->status == 'pending')
                                    <button
                                        wire:click="cancelApplication({{ $project->applications->firstWhere('project_role_id', $pr->id)->id }})"
                                        class="text-xs px-3 py-1 rounded-md border border-red-200 text-red-600">Batal</button>
                                @elseif($appliedForThis && $roleApplicant->status == 'rejected')
                                    <button disabled
                                        class="text-xs px-3 py-1 rounded-md border bg-gray-200 text-gray-600">Ditolak</button>
                                @else
                                    <button wire:click="openApplyModal({{ $pr->id }})"
                                        class="text-xs px-3 py-1 rounded-md bg-blue-600 text-white">Lamar</button>
                                @endif
                            @endif

                            {{-- small progress bar --}}
                            <div class="w-28 h-2 bg-gray-100 rounded-full overflow-hidden">
                                @php
                                    $percent = $pr->quantity
                                        ? min(100, round(($filled / $pr->quantity) * 100))
                                        : ($filled
                                            ? 100
                                            : 0);
                                @endphp
                                <div class="h-full rounded-full"
                                    style="width: {{ $percent }}%; background: linear-gradient(90deg,#60a5fa,#3b82f6)">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tabs: Applicants & Members --}}
        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Applicants --}}
                <div>
                    <h4 class="text-md font-semibold text-gray-800">Lamaran Masuk</h4>
                    <div class="mt-3 space-y-3">
                        @forelse($project->applications as $app)
                            <div class="p-3 border rounded-lg flex justify-between items-start">
                                <div class="flex items-start gap-3">
                                    @if ($app->user->avatar)
                                        <img src="{{ $app->user->avatar }}" class="w-10 h-10 rounded-md object-cover"
                                            alt="avatar">
                                    @else
                                        <div
                                            class="w-6 h-6 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                            <h3 class="text-2xl font-bold text-white">
                                                {{ strtoupper(substr($app->user->name, 0, 1)) }}
                                            </h3>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-medium">{{ $app->user->name }}</div>
                                        <div class="text-xs text-gray-500">
                                            {{ $app->projectRole->role->name ?? 'Role' }} •
                                            {{ $app->created_at->diffForHumans() }}</div>
                                        <div class="text-sm text-gray-700 mt-2">{{ Str::limit($app->message, 64) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col items-end gap-2">
                                    <div
                                        class="text-xs px-2 py-1 rounded-md {{ $app->status == 'pending' ? 'bg-yellow-50 text-yellow-700' : ($app->status == 'accepted' ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700') }}">
                                        {{ ucfirst($app->status) }}
                                    </div>

                                    @if (auth()->id() === $project->owner_id && $app->status === 'pending')
                                        <div>
                                            <button wire:click="openApplicantModal({{ $app->id }})"
                                                class="text-xs px-3 py-1 rounded-md bg-blue-600 text-white">Lihat</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-sm text-gray-500">Belum ada pelamar.</div>
                        @endforelse
                    </div>
                </div>

                {{-- Members --}}
                <div>
                    <h4 class="text-md font-semibold text-gray-800">Anggota Project</h4>
                    <div class="mt-3 grid grid-cols-1 gap-3">
                        @if ($project->projectRoles)
                            @foreach ($project->projectRoles as $pr)
                                @foreach ($pr->projectMembers ?? [] as $member)
                                    <div class="p-3 border rounded-lg flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $member->user->avatar ?? 'https://via.placeholder.com/40' }}"
                                                class="w-10 h-10 rounded-md object-cover">
                                            <div>
                                                <div class="font-medium">{{ $member->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $pr->role->name }} • Joined
                                                    {{ \Carbon\Carbon::parse($member->created_at ?? $member->joined_at)->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs text-gray-500">Active</div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif

                        @if (($project->roles->pluck('members')->flatten()->count() ?? 0) === 0)
                            <div class="text-sm text-gray-500">Belum ada anggota yang diterima.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Apply Modal --}}
    @if ($showApplyModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="absolute inset-0 bg-black opacity-30" wire:click="closeApplModal"></div>
            <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6 z-10">
                <h3 class="text-lg font-semibold">Melamar:
                    {{ optional($project->roles->firstWhere('id', $applyRoleId))->role?->name }}</h3>
                <textarea wire:model.defer="applyMessage" rows="6" class="mt-4 w-full border rounded-md p-2"
                    placeholder="Tulis pesan / cover letter (min 10 karakter)"></textarea>
                @error('applyMessage')
                    <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                @enderror

                <div class="mt-4 flex justify-end gap-3">
                    <button wire:click="closeApplyModal" class="px-4 py-2 rounded-md border">Batal</button>
                    <button wire:click="apply" class="px-4 py-2 rounded-md bg-blue-600 text-white">Kirim
                        Lamaran</button>
                </div>
            </div>
        </div>
    @endif

    {{-- Applicant Modal --}}
    @if ($showApplicantModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" wire:click="closeApplicantModal"></div>

            <!-- Modal Card -->
            <div class="relative bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 z-10 border border-gray-100">
                <!-- Header -->
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-3">
                        @if ($openedApplicant->user->avatar)
                            <img src="{{ $openedApplicant->user->avatar }}"
                                class="w-14 h-14 rounded-xl object-cover border border-gray-200 shadow-sm"
                                alt="avatar">
                        @else
                            <div
                                class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-sm">
                                <span class="text-xl font-bold text-white">
                                    {{ strtoupper(substr($openedApplicant->user->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $openedApplicant->user->name }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $openedApplicant->user->location ?? 'Tidak ada lokasi' }}</p>
                        </div>
                    </div>

                    <button wire:click="closeApplicantModal"
                        class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        x
                    </button>
                </div>

                <!-- Metadata -->
                <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                    <span class="inline-flex items-center gap-1">
                        🧩 <strong>{{ $openedApplicant->projectRole->role->name ?? 'Role' }}</strong>
                    </span>
                    <span>{{ $openedApplicant->created_at->diffForHumans() }}</span>
                </div>

                <!-- Message -->
                <div class="mb-5">
                    <h4 class="text-sm font-semibold text-gray-700 mb-1">Pesan Pelamar</h4>
                    <p class="text-gray-700 bg-gray-50 border border-gray-100 rounded-lg p-3 leading-relaxed text-sm">
                        {{ $openedApplicant->message ?? '-' }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-3">
                    <button wire:click="rejectApplication({{ $openedApplicant->id }})"
                        wire:target="rejectApplication({{ $openedApplicant->id }})"
                        class="px-4 py-2 rounded-lg text-sm font-medium border border-red-200 text-red-600 hover:bg-red-50 transition">
                        Tolak
                    </button>

                    <button wire:click="acceptApplication({{ $openedApplicant->id }})"
                        wire:target="acceptApplication({{ $openedApplicant->id }})"
                        class="px-4 py-2 rounded-lg text-sm font-medium bg-green-600 text-white hover:bg-green-700 transition">
                        Terima
                    </button>
                </div>
            </div>
        </div>

    @endif

    {{-- Flash messages --}}
    <div class="fixed bottom-6 right-6 z-50">
        @if (session()->has('success'))
            <div class="px-4 py-2 bg-green-600 text-white rounded-lg shadow">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="px-4 py-2 bg-red-600 text-white rounded-lg shadow">{{ session('error') }}</div>
        @endif
    </div>
</div>
