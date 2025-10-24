<!-- resources/views/livewire/landing-page.blade.php -->
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <img class="w-8 h-8" src="./images/logo.png" alt="logo">
                    <span class="text-xl font-bold text-gray-900">IDCollabSpace</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition">Home</a>
                    <a href="#projects" class="text-gray-600 hover:text-gray-900 transition">Projects</a>
                    <a href="#contributors" class="text-gray-600 hover:text-gray-900 transition">Contributor</a>
                    <a href="#categories" class="text-gray-600 hover:text-gray-900 transition">Categories</a>
                    <button onclick="window.location.href = '{{ route('login') }}'"
                        class="px-6 py-3 font-semibold bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">Mulai
                        Sekarang</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="" class="relative overflow-hidden py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-center gap-12 items-center">
                <div class="w-full md:w-1/2">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                        Build & Collaborate
                    </div>
                    <h1 class="text-4xl my-6 lg:text-5xl font-black text-gray-900 leading-relaxed">
                        Bangun Proyek impianmu bersama-sama
                    </h1>
                    <p class="text-gray-600">
                        <span class="text-black">IDCollabSpace</span> adalah platform kolaborasi project yang
                        mempertemukan kreator dan
                        kontributor untuk membangun proyek nyata bersama.
                        Temukan partner terbaik untuk ide brilianmu atau bergabung dalam proyek yang menginspirasi.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-6">
                        <button
                            class="px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition shadow-xl shadow-blue-600/30 font-semibold">
                            Mulai Sekarang
                        </button>
                        <button
                            class="px-8 py-4 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition border-2 border-gray-200 font-semibold">
                            Lihat Project
                        </button>
                    </div>
                    <div class="flex items-center space-x-8 pt-4">
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
                    </div>
                </div>
                <div class="relative">
                    <!-- Project Cards Mockup -->
                    <div class="relative z-10 space-y-4">
                        <div class="bg-white rounded-2xl shadow-xl p-6 w-[130%] transform rotate-2">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600"></div>
                                <div>
                                    <div class="font-semibold text-gray-900">Healthcare Project</div>
                                    <div class="text-sm text-gray-600">5 kontributor aktif</div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">React</span>
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">Open</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-xl p-6 w-[130%] transform -rotate-2 ml-8">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-purple-500 to-purple-600"></div>
                                <div>
                                    <div class="font-semibold text-gray-900">Learning App Project</div>
                                    <div class="text-sm text-gray-600">3 kontributor aktif</div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">UI/UX</span>
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs">Open</span>
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
    <section id="projects" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center mb-16">
                <h2 class="text-4xl max-w-3xl font-black text-gray-900 mb-4">Proyek Terbaru dari Komunitas <span
                        class="text-blue-600">IDCollabSpace</span>
                </h2>
                <p class="text-gray-600 max-w-2xl">Lihat proyek-proyek menarik yang sedang dikembangkan bersama
                    oleh para kreator dan kontributor berbakat.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $projects = [
                        [
                            'name' => 'E-Commerce Platform',
                            'status' => 'In Progress',
                            'roles' => ['Frontend Dev', 'Backend Dev', 'UI Designer'],
                            'color' => 'blue',
                        ],
                        [
                            'name' => 'Trading Platform',
                            'status' => 'Review',
                            'roles' => ['UI Designer', 'Backend Dev', 'Marketing'],
                            'color' => 'purple',
                        ],
                        [
                            'name' => 'WiseCommunity',
                            'status' => 'Planning',
                            'roles' => ['Content Writer', 'Social Media', 'Copywriter'],
                            'color' => 'green',
                        ],
                        [
                            'name' => 'Customer Portal',
                            'status' => 'In Progress',
                            'roles' => ['Full Stack Dev', 'UX Designer', 'QA Tester'],
                            'color' => 'orange',
                        ],
                        [
                            'name' => 'Hackathon Project',
                            'status' => 'Testing',
                            'roles' => ['Backend Dev', 'DevOps', 'Technical Writer'],
                            'color' => 'yellow',
                        ],
                        [
                            'name' => 'SaveIn: A Savings App',
                            'status' => 'In Progress',
                            'roles' => ['Mobile Dev', 'UI Designer', 'Product Manager'],
                            'color' => 'green',
                        ],
                    ];
                @endphp
                @foreach ($projects as $project)
                    <div
                        class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 hover:shadow-xl transition-all border border-gray-200 group hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-4">
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-{{ $project['color'] }}-400 to-{{ $project['color'] }}-600 rounded-xl">
                            </div>
                            <span
                                class="px-3 py-1 bg-white text-{{ $project['color'] }}-600 text-xs font-semibold rounded-full border border-{{ $project['color'] }}-200">
                                {{ $project['status'] }}
                            </span>
                        </div>
                        <h3
                            class="text-xl font-bold text-gray-900 mb-2 group-hover:text-{{ $project['color'] }}-600 transition">
                            {{ $project['name'] }}
                        </h3>

                        <!-- Roles Section -->
                        <div class="pt-4 border-t border-gray-300">
                            <div class="text-xs font-semibold text-gray-500 mb-2">Roles Dibutuhkan:</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project['roles'] as $role)
                                    <span
                                        class="px-3 py-1 bg-white text-gray-700 text-xs font-medium rounded-full border border-gray-300">
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
    <section id="contributors" class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Kontributor Teraktif</h2>
                <p class="text-gray-600 max-w-2xl">Kenali para builder yang berkontribusi di berbagai proyek
                    kolaboratif.
                    Jadilah bagian dari komunitas profesional yang saling mengembangkan diri.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $contributors = [
                        [
                            'name' => 'Sarah Johnson',
                            'role' => 'Product Designer',
                            'projects' => 24,
                            'avatar' => 'purple',
                        ],
                        ['name' => 'Michael Chen', 'role' => 'Lead Developer', 'projects' => 18, 'avatar' => 'blue'],
                        [
                            'name' => 'Emily Rodriguez',
                            'role' => 'Project Manager',
                            'projects' => 12,
                            'avatar' => 'green',
                        ],
                        ['name' => 'David Kim', 'role' => 'UX Designer', 'projects' => 6, 'avatar' => 'orange'],
                    ];
                @endphp
                @foreach ($contributors as $index => $contributor)
                    <div
                        class="bg-white rounded-2xl p-6 hover:shadow-xl transition-all border border-gray-200 text-center group hover:-translate-y-2">
                        @if ($index === 0)
                            <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                                <span
                                    class="px-3 py-1 bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-bold rounded-full">
                                    🏆 TOP
                                </span>
                            </div>
                        @endif
                        <div
                            class="w-24 h-24 mx-auto mb-4 rounded-full bg-gradient-to-br from-{{ $contributor['avatar'] }}-400 to-{{ $contributor['avatar'] }}-600 flex items-center justify-center text-white text-2xl font-bold">
                            {{ substr($contributor['name'], 0, 1) }}
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $contributor['name'] }}</h3>
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
    <section id="categories" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 max-w-3xl">Jelajahi Kategori Proyek Populer</h2>
                <p class="text-gray-600 max-w-2xl">Temukan proyek berdasarkan minat dan keahlianmu. Mulai dari
                    teknologi,
                    desain, edukasi, hingga sosial.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $categories = [
                        ['name' => 'Development', 'icon' => '💻', 'count' => 45, 'color' => 'blue'],
                        ['name' => 'Design', 'icon' => '🎨', 'count' => 32, 'color' => 'purple'],
                        ['name' => 'Marketing', 'icon' => '📢', 'count' => 28, 'color' => 'green'],
                        ['name' => 'Sales', 'icon' => '💼', 'count' => 21, 'color' => 'orange'],
                        ['name' => 'Support', 'icon' => '🎧', 'count' => 38, 'color' => 'red'],
                        ['name' => 'Operations', 'icon' => '⚙️', 'count' => 19, 'color' => 'indigo'],
                    ];
                @endphp
                @foreach ($categories as $category)
                    <div
                        class="bg-gradient-to-br from-{{ $category['color'] }}-50 to-{{ $category['color'] }}-100 rounded-2xl p-8 hover:shadow-xl transition-all border border-{{ $category['color'] }}-200 group hover:-translate-y-1 cursor-pointer">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-5xl">{{ $category['icon'] }}</div>
                            <span
                                class="px-4 py-2 bg-white text-{{ $category['color'] }}-600 font-bold rounded-full text-sm">
                                {{ $category['count'] }} projects
                            </span>
                        </div>
                        <h3
                            class="text-2xl font-bold text-gray-900 group-hover:text-{{ $category['color'] }}-600 transition">
                            {{ $category['name'] }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 lg:py-28 overflow-hidden">
        <!-- Modern Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700"></div>

        <!-- Animated Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-tr from-purple-600/20 via-transparent to-pink-600/20"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-400/30 rounded-full blur-3xl"></div>

        <!-- Grid Pattern -->
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-40">
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <!-- Badge -->
            <div
                class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-full text-sm font-medium mb-6 border border-white/20">
                <span class="mr-2">✨</span>
                Mulai Perjalanan Kolaborasimu
            </div>

            <!-- Heading -->
            <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">
                Waktunya Bangun<br />
                <span
                    class="bg-gradient-to-r from-yellow-200 via-pink-200 to-purple-200 bg-clip-text text-transparent">
                    Kolaborasi Hebat
                </span>
            </h2>

            <!-- Description -->
            <p class="text-lg lg:text-xl text-blue-50/90 mb-10 max-w-2xl mx-auto leading-relaxed">
                Temukan orang-orang yang siap membangun bersama. Mulailah perjalananmu sebagai kreator atau kontributor
                di IDCollabSpace.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <button
                    class="group px-8 py-4 bg-white text-blue-600 rounded-xl hover:bg-blue-50 transition-all shadow-2xl shadow-blue-900/30 font-bold text-lg hover:scale-105 transform">
                    Mulai Sekarang
                    <span class="inline-block ml-2 group-hover:translate-x-1 transition-transform">→</span>
                </button>
                <button
                    class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white rounded-xl hover:bg-white/20 transition-all border-2 border-white/30 font-bold text-lg hover:scale-105 transform">
                    Lihat Project
                </button>
            </div>

            <!-- Features List -->
            <div class="flex flex-wrap items-center justify-center gap-6 text-blue-50/80 text-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Gratis Selamanya</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Kolaborasi Sepenuhnya</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Setup 2 Menit</span>
                </div>
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
