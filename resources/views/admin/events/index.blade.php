<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manajemen Acara
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 shadow-sm rounded-r" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <form action="{{ route('events.index') }}" method="GET" class="flex gap-2 w-full sm:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari acara atau lokasi..."
                        class="rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-sm w-full sm:w-64">

                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-bold text-sm transition shadow-sm">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('events.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition shadow-sm flex items-center">
                            Reset
                        </a>
                    @endif
                </form>

                <a href="{{ route('events.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 font-bold shadow-md hover:shadow-lg transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Buat Acara Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-xs font-bold tracking-wider leading-normal">
                                <th class="p-4">Nama Acara</th>
                                <th class="p-4">Tanggal & Lokasi</th>
                                <th class="p-4">Link Form</th>
                                <th class="p-4 text-center">Status</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($events as $event)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                                    <td class="p-4 align-middle">
                                        <span class="font-bold text-gray-800 text-base block">{{ $event->title }}</span>
                                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded mt-1 inline-block">
                                            {{ $event->category->name ?? 'Umum' }}
                                        </span>
                                    </td>

                                    <td class="p-4 align-middle">
                                        <div class="flex flex-col gap-1">
                                            <div class="flex items-center text-gray-700 font-medium">
                                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}
                                            </div>
                                            <div class="flex items-center text-gray-500 text-xs">
                                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                {{ $event->location }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-4 align-middle">
                                        <a href="{{ route('registration.form', $event->id) }}" target="_blank"
                                            class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-xs bg-blue-50 px-3 py-1 rounded-full border border-blue-100 hover:bg-blue-100 transition">
                                            Lihat Form
                                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        </a>
                                    </td>

                                    <td class="p-4 text-center align-middle">
                                        @if($event->is_open)
                                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                                Terbuka
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">
                                                <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                                Ditutup
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-center align-middle">
                                        <div class="flex items-center justify-center gap-3">

                                            <form action="{{ route('events.toggle', $event->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg border shadow-sm transition duration-200
                                                    {{ $event->is_open
                                                        ? 'bg-white text-red-600 border-red-200 hover:bg-red-50'
                                                        : 'bg-white text-green-600 border-green-200 hover:bg-green-50'
                                                    }}"
                                                    title="{{ $event->is_open ? 'Klik untuk Menutup' : 'Klik untuk Membuka' }}">
                                                    {{ $event->is_open ? 'Tutup' : 'Buka' }}
                                                </button>
                                            </form>

                                            <div class="w-px h-6 bg-gray-200"></div> <a href="{{ route('events.edit', $event->id) }}"
                                                class="text-gray-400 hover:text-amber-500 transition duration-200 transform hover:scale-110"
                                                title="Edit Data">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara &quot;{{ $event->title }}&quot;? Data peserta juga akan terhapus.');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-red-600 transition duration-200 transform hover:scale-110"
                                                    title="Hapus Acara">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($events->hasPages())
                        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                            {{ $events->appends(['search' => request('search')])->links() }}
                        </div>
                    @endif
                </div>
            </div>

            @if($events->count() == 0)
                <div class="text-center py-12">
                    <p class="text-gray-500 italic">Belum ada acara yang dibuat.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
