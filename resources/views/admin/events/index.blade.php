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
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mb-6 flex justify-between items-center">
                <form action="{{ route('events.index') }}" method="GET" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari acara atau lokasi..."
                        class="rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-sm w-64">

                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-bold text-sm transition">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('events.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition">
                            Reset
                        </a>
                    @endif
                </form>
                <a href="{{ route('events.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 font-bold shadow">
                    + Buat Acara Baru
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b text-gray-600 uppercase text-sm leading-normal">
                            <th class="p-3">Nama Acara</th>
                            <th class="p-3">Tanggal</th>
                            <th class="p-3">Lokasi</th>
                            <th class="p-3">Link</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($events as $event)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-3 font-bold text-gray-800">{{ $event->title }}</td>
                                <td class="p-3">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}
                                </td>
                                <td class="p-3">{{ $event->location }}</td>
                                <td class="p-3">
                                    <a href="{{ route('registration.form', $event->id) }}" target="_blank"
                                        class="text-blue-500 hover:text-blue-700 font-medium">
                                        Lihat Form ↗
                                    </a>
                                </td>
                                <td class="p-3 text-center">
                                    <div class="flex item-center justify-center space-x-3">

                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="text-gray-400 hover:text-amber-500 transition duration-200"
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus acara ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn-delete text-gray-400 hover:text-red-600 transition duration-200"
                                                title="Hapus">
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
                <div class="mt-6">
                    {{ $events->appends(['search' => request('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
