<!-- resources/views/livewire/landing-page.blade.php -->
<div class="min-h-screen bg-stone-50">
    <!-- Navigation -->
    <nav class="backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <img class="w-8 h-8" src="./images/logo.png" alt="logo">
                    <span class="text-xl font-bold text-blue-600">IDCollabSpace</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition">Home</a>
                    <a href="#projects" class="text-gray-600 hover:text-gray-900 transition">Projects</a>
                    <a href="#contributors" class="text-gray-600 hover:text-gray-900 transition">Contributor</a>
                    <a href="#categories" class="text-gray-600 hover:text-gray-900 transition">Categories</a>
                    <x-button wire:navigate href="{{ route('login') }}">Mulai
                        Sekarang</x-button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="" class="relative overflow-hidden py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center gap-12 items-center">
                <img src="images/dot-grid.png" alt="dot grid" class="absolute top-0 left-0 w-full -z-0 opacity-25">
                <div class="w-full text-center flex flex-col items-center px-48 z-10">
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 font-semibold rounded-md">Collab &
                        Build</span>
                    <h1 class="text-4xl mt-2 lg:text-5xl font-black text-gray-900 leading-relaxed">
                        Bangun proyek impianmu bersama-sama
                    </h1>
                    <p class="text-gray-600 font-medium mt-4">
                        <span class="text-blue-600">IDCollabSpace</span> adalah platform kolaborasi project yang
                        mempertemukan kreator dan
                        kontributor untuk membangun proyek nyata bersama.
                        Temukan partner terbaik untuk ide brilianmu atau bergabung dalam proyek yang menginspirasi.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-6">
                        <x-button wire:navigate href="{{ route('login') }}">Mulai Sekarang</x-button>
                        <button
                            class="px-8 py-4 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition border-2 border-gray-200 font-semibold">
                            Lihat Project
                        </button>
                    </div>
                    {{-- <div class="flex items-center space-x-8 pt-4">
                        <div class="flex -space-x-2">
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 border-2 border-white">
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 border-2 border-white">
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white">
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 border-2 border-white">
                            </div>
                        </div>
                        <div class="text-sm">
                            <div class="font-semibold text-gray-900">10,000+ kontributor</div>
                            <div class="text-gray-600">Bergabung ke proyek baru</div>
                        </div>
                    </div> --}}
                </div>
                <div class="relative">
                    <!-- Project Cards Mockup -->
                    <div class="relative z-10 space-x-4 flex">
                        <div class="bg-white rounded-2xl shadow-xl p-6 w-[130%] transform rotate-2">
                            <div class="flex justify-end">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 font-medium rounded-md text-xs">Open</span>
                            </div>
                            <div class="flex items-center gap-3 my-3">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600"></div>
                                <div>
                                    <div class="font-semibold text-gray-900">Healthcare Project</div>
                                    <div class="text-sm text-gray-600">5 kontributor aktif</div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 bg-stone-100 rounded-full text-xs">UI/UX</span>
                                <span class="px-3 py-1 bg-stone-100 rounded-full text-xs">Frontend</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-xl p-6 w-[130%] transform -rotate-2">
                            <div class="flex justify-end">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 font-medium rounded-md text-xs">In
                                    progress</span>
                            </div>
                            <div class="flex items-center gap-3 my-3">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-purple-500 to-purple-600"></div>
                                <div>
                                    <div class="font-semibold text-gray-900">Learning App Project</div>
                                    <div class="text-sm text-gray-600">3 kontributor aktif</div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 bg-stone-100 rounded-full text-xs">Backend</span>
                                <span class="px-3 py-1 bg-stone-100 rounded-full text-xs">Writter</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-xl p-6 w-[130%] transform rotate-2">
                            <div class="flex justify-end">
                                <span
                                    class="px-3 py-1 bg-red-100 text-red-700 font-medium rounded-md text-xs">Completed</span>
                            </div>
                            <div class="flex items-center gap-3 my-3">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600"></div>
                                <div>
                                    <div class="font-semibold text-gray-900">Turnamen OSINT</div>
                                    <div class="text-sm text-gray-600">2 kontributor aktif</div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 bg-stone-100 rounded-full text-xs">Redhat</span>
                                <span class="px-3 py-1 bg-stone-100 rounded-full text-xs">Bluehat</span>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute top-10 right-10 w-20 h-20 bg-blue-200 rounded-full blur-3xl opacity-60"></div>
                    <div class="absolute bottom-10 left-10 w-32 h-32 bg-purple-200 rounded-full blur-3xl opacity-60">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Projects -->
    <section id="projects" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center mb-16 px-48">
                <h2 class="text-4xl font-black text-gray-900 mb-4">Proyek terbaru dari komunitas <span
                        class="text-blue-600">IDCollabSpace</span>
                </h2>
                <p class="text-gray-600 max-w-2xl">Lihat proyek-proyek menarik yang sedang dikembangkan bersama
                    oleh para kreator dan kontributor berbakat.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($this->projects as $project)
                    <div
                        class="bg-white rounded-2xl p-6 hover:shadow-xl transition-all border border-gray-200 group hover:-translate-y-1">
                        <div class="flex justify-end">
                            <span
                                class="px-3 py-1 {{ $this->getStatusColor($project['status']) }} text-xs font-semibold rounded-md">
                                {{ $project['status'] }}
                            </span>
                        </div>
                        <div class="flex items-center gap-4 my-3">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-{{ $project['color'] }}-400 to-{{ $project['color'] }}-600 rounded-xl">
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 group-hover:text-{{ $project['color'] }}-600 transition">
                                {{ $project['name'] }}
                            </h3>
                        </div>
                        <p class="text-xs text-gray-600">{{ $project['description'] }}</p>

                        <!-- Roles Section -->
                        <div class="mt-3 pt-3 border-t border-gray-300">
                            <div class="text-xs font-semibold text-gray-500 mb-2">Roles Dibutuhkan:</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project['roles'] as $role)
                                    <span class="px-3 py-1 bg-stone-100 text-gray-700 text-xs font-medium rounded-full">
                                        {{ $role }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Contributors -->
    <section id="contributors" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Kontributor Teratas</h2>
                <p class="text-gray-600 max-w-2xl">Kenali para builder yang berkontribusi di berbagai proyek
                    kolaboratif.
                    Jadilah bagian dari komunitas profesional yang saling mengembangkan diri.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($this->contributors as $index => $contributor)
                    <div
                        class="bg-white rounded-2xl p-6 hover:shadow-xl transition-all border border-gray-200 text-center group hover:-translate-y-2">
                        <div class="flex justify-center">
                            <img src="{{ $contributor['avatar'] }}" alt="{{ $contributor['name'] }}"
                                class="w-24 h-24 rounded-full" />
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mt-1">{{ $contributor['name'] }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ $contributor['role'] }}</p>
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4">
                            <div class="text-3xl font-bold mb-1">
                                {{ $contributor['projects'] }}</div>
                            <div class="text-sm text-gray-600">Projects Joined</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section id="categories" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 max-w-3xl">Jelajahi kategori proyek populer</h2>
                <p class="text-gray-600 max-w-2xl">Temukan proyek berdasarkan minat dan keahlianmu. Mulai dari
                    teknologi,
                    desain, edukasi, hingga sosial.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($this->categories as $category)
                    <div
                        class="flex justify-between items-center bg-{{ $category['color'] }}-100 rounded-2xl p-8 hover:shadow-xl transition-all border group hover:-translate-y-1 cursor-pointer">
                        <div
                            class="text-5xl bg-gradient-to-br from-{{ $category['color'] }}-400 to-{{ $category['color'] }}-600 p-2 rounded-xl">
                            {!! $category['icon'] !!}
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <h3 class="text-2xl font-bold text-gray-900 transition">
                                {{ $category['name'] }}
                            </h3>
                            <span class="font-medium text-gray-600 rounded-full text-sm">
                                {{ $category['count'] }} projects
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 overflow-hidden">
        <!-- Modern Gradient Background -->
        {{-- <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700"></div> --}}

        <!-- Animated Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-tr from-purple-500/15 via-transparent to-pink-600/15"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-sky-500/30 rounded-full blur-3xl"></div>

        <!-- Noise Overlay -->
        <div
            class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] mix-blend-overlay pointer-events-none">
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <!-- Badge -->
            <span class="px-3 py-2 bg-blue-100 text-blue-700 font-semibold rounded-md">
                <span class="mr-2">✨</span>
                Mulai Perjalanan Kolaborasimu
            </span>

            <!-- Heading -->
            <h2 class="text-4xl lg:text-5xl font-black mt-4 leading-tight">
                Waktunya Bangun
                Kolaborasi Hebat
            </h2>

            <!-- Description -->
            <p class="text-gray-600 font-medium mt-4">
                Temukan orang-orang yang siap membangun bersama.<br />
                Mulailah perjalananmu sebagai kreator atau kontributor di
                <span class="text-blue-600">IDCollabSpace</span>.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-6">
                <x-button wire:navigate href="{{ route('login') }}">
                    Mulai Sekarang
                </x-button>
                <button
                    class="px-8 py-4 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition border-2 border-gray-200 font-semibold">
                    Lihat Project
                </button>
            </div>

            <!-- Features List -->
            <div class="flex flex-wrap items-center justify-center gap-6 mt-12 text-sm">
                @foreach (['Bangun Pengalaman', 'Realisasikan Ide', 'Kolaborasi Nyata'] as $feature)
                    <div class="flex items-center gap-2 border border-green-400 bg-green-100 px-4 py-2 rounded-full">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-800">{{ $feature }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-50 text-black py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <img class="w-8 h-8" src="./images/logo.png" alt="logo">
                        <span class="text-xl font-bold text-blue-600">IDCollabSpace</span>
                    </div>
                    <p class="text-sm text-gray-600">Bangun Proyek impianmu bersama-sama.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-black mb-4">Product</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-black transition">Features</a></li>
                        <li><a href="#" class="hover:text-black transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-black transition">Security</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-black mb-4">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-black transition">About</a></li>
                        <li><a href="#" class="hover:text-black transition">Careers</a></li>
                        <li><a href="#" class="hover:text-black transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-black mb-4">Resources</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-black transition">Blog</a></li>
                        <li><a href="#" class="hover:text-black transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-black transition">Support</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 text-center text-sm text-gray-600">
                <p>&copy; 2025 WorkFlow. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>
