<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Acara') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Total Acara Aktif</p>
                            <h3 class="text-3xl font-bold mt-1">{{ $events->count() }}</h3>
                        </div>
                        <div class="p-3 bg-white/20 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg shadow-purple-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-purple-100 text-sm font-medium">Total Pendaftar</p>
                            <h3 class="text-3xl font-bold mt-1">{{ $events->sum('total_registrants') }}</h3>
                        </div>
                        <div class="p-3 bg-white/20 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg shadow-green-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-green-100 text-sm font-medium">Total Check-in</p>
                            <h3 class="text-3xl font-bold mt-1">{{ $events->sum('total_attended') }}</h3>
                        </div>
                        <div class="p-3 bg-white/20 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-xl font-bold text-gray-800 mb-6 border-l-4 border-indigo-500 pl-3">Daftar Acara</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($events as $index => $event)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 overflow-hidden flex flex-col">
                        <div class="p-6 pb-4">
                            <div class="flex justify-between items-start">
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-bold px-2.5 py-0.5 rounded-full">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                </span>
                                <span class="text-gray-400 text-xs flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ Str::limit($event->location, 15) }}
                                </span>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mt-3 mb-1 leading-tight">{{ $event->title }}</h4>
                            <p class="text-sm text-gray-500">{{ Str::limit($event->description, 60) }}</p>
                        </div>

                        <div class="px-6 py-2">
                            @php
                                $percent =
                                    $event->total_registrants > 0
                                        ? ($event->total_attended / $event->total_registrants) * 100
                                        : 0;
                                $color = $percent < 50 ? 'bg-yellow-400' : 'bg-green-500';
                            @endphp
                            <div class="flex justify-between text-xs mb-1 font-semibold text-gray-600">
                                <span>Kehadiran</span>
                                <span>{{ round($percent) }}%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5">
                                <div class="{{ $color }} h-2.5 rounded-full transition-all duration-1000"
                                    style="width: {{ $percent }}%"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 border-t border-gray-100 mt-auto bg-gray-50">
                            <div class="p-4 text-center border-r border-gray-100">
                                <span class="block text-xl font-bold text-gray-800">{{ $event->quota }}</span>
                                <span class="text-xs text-gray-500 uppercase tracking-wider">Kuota</span>
                            </div>
                            <div class="p-4 text-center border-r border-gray-100">
                                <span
                                    class="block text-xl font-bold text-blue-600">{{ $event->total_registrants }}</span>
                                <span class="text-xs text-gray-500 uppercase tracking-wider">Daftar</span>
                            </div>
                            <div class="p-4 text-center">
                                <span
                                    class="block text-xl font-bold text-green-600">{{ $event->total_attended }}</span>
                                <span class="text-xs text-gray-500 uppercase tracking-wider">Hadir</span>
                            </div>
                        </div>

                        <div class="p-4 bg-white border-t border-gray-100">
                            <button onclick="openModal('modal-{{ $event->id }}')"
                                class="w-full py-2 px-4 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 font-semibold transition text-sm flex justify-center items-center gap-2">
                                Lihat Detail & Grafik
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="modal-{{ $event->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                onclick="closeModal('modal-{{ $event->id }}')"></div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>

                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Statistik: {{ $event->title }}
                                        </h3>
                                        <div class="mt-4">
                                            <div class="w-full h-64">
                                                <canvas id="chart-{{ $event->id }}"></canvas>
                                            </div>

                                            <div class="mt-4 grid grid-cols-2 gap-4 text-sm bg-gray-50 p-4 rounded-lg">
                                                <div>
                                                    <p class="text-gray-500">Kuota Tersedia</p>
                                                    <p class="font-bold">
                                                        {{ $event->quota - $event->total_registrants }} Kursi</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500">Persentase Hadir</p>
                                                    <p class="font-bold">{{ round($percent) }}%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        onclick="closeModal('modal-{{ $event->id }}')">
                                        Tutup
                                    </button>
                                    <a href="{{ route('events.edit', $event->id) }}"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700 sm:ml-3 sm:w-auto sm:text-sm">
                                        Edit Acara
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($events->isEmpty())
                <div class="text-center py-20">
                    <p class="text-gray-500 text-lg">Belum ada acara. Yuk buat sekarang!</p>
                </div>
            @endif

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data Events dari Laravel ke JS
        const eventsData = @json($events);

        // Fungsi Buka Modal
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        // Fungsi Tutup Modal
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Generate Chart untuk setiap Event
        eventsData.forEach(event => {
            const ctx = document.getElementById('chart-' + event.id);
            if (ctx) {
                const notAttended = event.total_registrants - event.total_attended;

                new Chart(ctx, {
                    type: 'doughnut', // Tipe Diagram Donat
                    data: {
                        labels: ['Hadir', 'Belum Hadir/Tidak Datang'],
                        datasets: [{
                            data: [event.total_attended, notAttended],
                            backgroundColor: [
                                '#10B981', // Hijau (Hadir)
                                '#E5E7EB' // Abu-abu (Belum)
                            ],
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            }
                        }
                    }
                });
            }
        });
    </script>
</x-app-layout>
