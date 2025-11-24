<div class="p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Selamat datang kembali, {{ auth()->user()->name }} 👋</h1>
        <p class="text-gray-500">Semoga harimu menyenangkan.</p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full mb-8">

        {{-- Total Role --}}
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0  1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Role</p>
                <p class="font-bold text-2xl text-gray-800">{{ $totalRoles }}</p>
            </div>
        </div>

        {{-- Total Category --}}
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Kategori</p>
                <p class="font-bold text-2xl text-gray-800">{{ $totalCategories }}</p>
            </div>
        </div>

        {{-- Total Talent --}}
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Talent</p>
                <p class="font-bold text-2xl text-gray-800">{{ $totalTalents }}</p>
            </div>
        </div>

        {{-- Total Project --}}
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Project</p>
                <p class="font-bold text-2xl text-gray-800">{{ $totalProjects }}</p>
            </div>
        </div>
    </div>

    {{-- Charts --}}
    <div class="flex gap-6 mb-8">

        {{-- Bar Chart --}}
        <div class="bg-white p-6 w-3/5 rounded-2xl shadow border border-gray-200">
            <h2 class="font-semibold text-gray-800 mb-4">Project per Kategori</h2>
            <div id="barChart"></div>
        </div>

        {{-- Donut Chart --}}
        <div class="bg-white p-6 w-2/5 rounded-2xl shadow border border-gray-200">
            <h2 class="font-semibold text-gray-800 mb-4">Project per Status</h2>
            <div id="statusProjectChart"></div>
        </div>
    </div>

    {{-- Charts --}}
    <div class="flex gap-6">

        {{-- Bar Chart --}}
        <div class="bg-white p-6 w-3/5 rounded-2xl shadow border border-gray-200">
            <h2 class="font-semibold text-gray-800 mb-4">Distribusi Role</h2>
            <div id="roleChart"></div>
        </div>

        {{-- Donut Chart --}}
        {{-- <div class="bg-white p-6 w-2/5 rounded-2xl shadow border border-gray-200">
            <h2 class="font-semibold text-gray-800 mb-4">Distribusi Role</h2>
            <div id="roleChart"></div>
        </div> --}}
    </div>

</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Livewire !== 'undefined') {
                initChart();
            }
        });

        const initChart = () => {
            // BAR CHART
            var barOptions = {
                chart: {
                    type: 'bar',
                    height: 350,
                },
                series: [{
                    name: 'Projects',
                    data: @json($projectCounts),
                }],
                xaxis: {
                    categories: @json($categoryNames),
                },
                colors: ['#3b82f6'],
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                    }
                }
            };

            new ApexCharts(document.querySelector("#barChart"), barOptions).render();

            const statusLabels = @js($statusLabels);
            const statusCounts = @js($statusCounts);

            let projectStatusOptions = {
                chart: {
                    type: 'donut',
                    height: 350,
                },
                labels: statusLabels,
                series: statusCounts,
                colors: [
                    '#ef4444', // rejected
                    '#facc15', // pending
                    '#22c55e', // accepted
                ],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: (val) => `${val.toFixed(1)}%`
                }
            };

            let projectStatusChart = new ApexCharts(
                document.querySelector("#statusProjectChart"),
                projectStatusOptions
            );
            projectStatusChart.render();

            var roleOptions = {
                chart: {
                    type: 'bar',
                    height: 350,
                },
                series: [{
                    name: 'Projects',
                    data: @json($roleCounts),
                }],
                xaxis: {
                    categories: @json($roleNames),
                },
                colors: ['#3b82f6'],
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                    }
                }
            };

            new ApexCharts(document.querySelector("#roleChart"), roleOptions).render();

        }
    </script>
@endpush
