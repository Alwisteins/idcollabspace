<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Selamat datang kembali, {{ auth()->user()->name }} 👋</h1>
        <p class="text-gray-500">Kamu punya 2 lamaran yang menunggu review hari ini.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
        <!-- Card: Lamaran Dikirim -->
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div
                class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all">
                <!-- Icon: Paper Airplane -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Lamaran Dikirim</p>
                <p class="font-bold text-2xl text-gray-800">{{ array_sum($applicationsSent) }}</p>
            </div>
        </div>

        <!-- Card: Lamaran Diterima -->
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div
                class="w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-all">
                <!-- Icon: Check Circle -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Lamaran Masuk</p>
                <p class="font-bold text-2xl text-gray-800">{{ array_sum($applicationsReceived) }}</p>
            </div>
        </div>

        <!-- Card: Project Dibuat -->
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div
                class="w-12 h-12 flex items-center justify-center rounded-xl bg-yellow-100 text-yellow-600 group-hover:bg-yellow-600 group-hover:text-white transition-all">
                <!-- Icon: Folder Plus -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Project Dibuat</p>
                <p class="font-bold text-2xl text-gray-800">{{ $createdProjects }}</p>
            </div>
        </div>

        <!-- Card: Project Diikuti -->
        <div
            class="flex items-center gap-4 bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <div
                class="w-12 h-12 flex items-center justify-center rounded-xl bg-purple-100 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all">
                <!-- Icon: Users -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Project Diikuti</p>
                <p class="font-bold text-2xl text-gray-800">{{ $followedProjects }}</p>
            </div>
        </div>
    </div>
    <div class="flex gap-6 mt-6">
        <div
            class="w-full bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <h1 class="text-lg font-medium text-gray-700">Lamaran Dikirim</h1>
            <div id="applicant-sent" wire:ignore></div>
        </div>
        <div
            class="w-full bg-white rounded-2xl p-6 hover:shadow-lg transition-all border border-gray-200 hover:-translate-y-1">
            <h1 class="text-lg font-medium text-gray-700">Lamaran Masuk</h1>
            <div id="applicant-received" wire:ignore></div>
            {{-- <div class="flex gap-2 text-sm font-medium text-gray-600"></div> --}}
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof Livewire !== 'undefined') {
                    initChart();
                }
            });

            document.addEventListener('livewire:navigated', function() {
                initChart();
            })

            const status = ['Pending', 'Accepted', 'Rejected'];

            function initChart() {
                const chartData = @json($chartData);
                renderApplicantChart('#applicant-sent', status, @json($applicationsSent));
                renderApplicantChart('#applicant-received', status, @json($applicationsReceived));
            }

            function renderEmptyState(target) {
                const el = document.querySelector(target);
                if (!el) return;

                el.innerHTML = `
                    <div class="w-full h-[300px] flex flex-col items-center justify-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3v18h18M7 7h6m-6 4h10m-10 4h8" />
                        </svg>
                        <p class="text-sm">Belum ada data untuk ditampilkan</p>
                    </div>
                `;
            }

            function renderApplicantChart(target, labels, series) {
                const applicantChart = document.querySelector(target);
                if (!applicantChart) return;

                const hasData = series.some(num => num > 0);
                if (!hasData) {
                    renderEmptyState(target);
                    return;
                }

                if (applicantChart.innerHTML !== '') applicantChart.innerHTML = '';

                const options = {
                    chart: {
                        height: 350,
                        type: 'pie'
                    },
                    labels: labels,
                    series: series,
                    colors: ['#FEB019', '#00E396', '#FF4560'],
                    legend: {
                        show: true,
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        formatter: function(seriesName, opts) {
                            const value = opts.w.globals.series[opts.seriesIndex];
                            return seriesName + ": " + value;
                        }
                    }
                };

                new ApexCharts(applicantChart, options).render();
            }
        </script>
    @endpush

</div>
