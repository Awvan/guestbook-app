<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Acara</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('events.update', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="mb-4">
                                <x-input-label for="event_category_id" value="Jenis Acara" />
                                <select name="event_category_id"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $event->event_category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-4">
                                <x-input-label for="title" value="Nama Acara" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                    value="{{ $event->title }}" required />
                            </div>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="description" value="Deskripsi" />
                            <textarea id="description" name="description" rows="3"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ $event->description }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <x-input-label for="event_date" value="Tanggal" />
                                <x-text-input id="event_date" class="block mt-1 w-full" type="datetime-local"
                                    name="event_date" value="{{ $event->event_date }}" required />
                            </div>
                            <div>
                                <x-input-label for="location" value="Lokasi" />
                                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                                    value="{{ $event->location }}" required />
                            </div>
                        </div>


                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="mb-4">
                                <x-input-label for="quota" value="Kuota" />
                                <x-text-input id="quota" class="block mt-1 w-full" type="number" name="quota"
                                    value="{{ $event->quota }}" required />
                            </div>

                            <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Status Pendaftaran</label>

                                <div class="flex items-center">
                                    <input type="hidden" name="is_open" value="0">

                                    <input id="is_open" type="checkbox" name="is_open" value="1"
                                        class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                        {{ old('is_open', $event->is_open) ? 'checked' : '' }}>

                                    <label for="is_open"
                                        class="ml-2 block text-sm text-gray-900 cursor-pointer select-none">
                                        Buka Pendaftaran
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-6">
                            <x-primary-button>Update Acara</x-primary-button>
                            <a href="{{ route('events.index') }}" class="text-gray-600">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
