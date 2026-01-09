<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Peserta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.participants.update', $registration->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="name" value="Nama Peserta" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $registration->name }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $registration->email }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="whatsapp" value="WhatsApp" />
                            <x-text-input id="whatsapp" class="block mt-1 w-full" type="text" name="whatsapp" value="{{ $registration->whatsapp }}" required />
                        </div>

                        <div class="mb-6 flex items-center">
                            <input id="is_attended" type="checkbox" name="is_attended" value="1" {{ $registration->is_attended ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_attended" class="ml-2 text-sm font-medium text-gray-900">Sudah Hadir (Check-in Manual)</label>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Simpan Perubahan</x-primary-button>
                            <a href="{{ route('admin.participants') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
