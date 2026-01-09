<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Acara Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('events.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="event_category_id" value="Jenis Acara" />
                            <select name="event_category_id" id="event_category_id"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('event_category_id')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="title" value="Nama Acara" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" value="Deskripsi Singkat" />
                            <textarea id="description" name="description" rows="3"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="event_date" value="Tanggal & Waktu" />
                                <x-text-input id="event_date" class="block mt-1 w-full" type="datetime-local"
                                    name="event_date" required />
                                <x-input-error :messages="$errors->get('event_date')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="location" value="Lokasi Acara" />
                                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                                    required />
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="quota" value="Kuota Peserta" />
                            <x-text-input id="quota" class="block mt-1 w-full" type="number" name="quota"
                                value="100" required />
                            <x-input-error :messages="$errors->get('quota')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button>{{ __('Simpan Acara') }}</x-primary-button>

                            <a href="{{ route('events.index') }}" class="text-gray-600 hover:text-gray-900">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
