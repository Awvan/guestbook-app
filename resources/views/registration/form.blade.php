<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="mb-4 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Formulir Pendaftaran
            </h2>
            <p class="text-gray-600 mt-2 text-lg font-medium">
                {{ $event->title }} </p>
            <p class="text-gray-500 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y, H:i') }} WIB
            </p>
        </div>

        <div class="w-full sm:max-w-lg mt-6 px-8 py-8 bg-white shadow-xl overflow-hidden sm:rounded-2xl">

            <form method="POST" action="{{ route('registration.store') }}">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">

                <div class="space-y-5">
                    <div>
                        <x-input-label for="name" value="Nama Lengkap" />
                        <x-text-input id="name" class="block mt-1 w-full p-3" type="text" name="name"
                            :value="old('name')" required autofocus placeholder="Nama Anda" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" value="Alamat Email" />
                        <x-text-input id="email" class="block mt-1 w-full p-3" type="email" name="email"
                            :value="old('email')" required placeholder="email@contoh.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="whatsapp" value="Nomor WhatsApp" />
                        <x-text-input id="whatsapp" class="block mt-1 w-full p-3" type="text" inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="whatsapp" :value="old('whatsapp')"
                            required placeholder="081234567890" />
                        <p class="text-xs text-gray-500 mt-1">*Pastikan nomor aktif untuk menerima Tiket QR Code.</p>
                        <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
                    </div>
                </div>


                @if ($event->category->name == 'Mahasiswa')
                    <div class="mt-8 p-5 bg-blue-50 border border-blue-100 rounded-xl">
                        <div class="flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                            <h3 class="font-bold text-blue-800 text-lg">Data Akademik</h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <x-input-label for="university" value="Asal Perguruan Tinggi" class="text-blue-900" />
                                <x-text-input id="university"
                                    class="block mt-1 w-full border-blue-200 focus:ring-blue-500 focus:border-blue-500"
                                    type="text" name="university" :value="old('university')" required
                                    placeholder="Nama Kampus Anda" />
                                <x-input-error :messages="$errors->get('university')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="major" value="Program Studi" class="text-blue-900" />
                                <x-text-input id="major"
                                    class="block mt-1 w-full border-blue-200 focus:ring-blue-500 focus:border-blue-500"
                                    type="text" name="major" :value="old('major')" required
                                    placeholder="Contoh: Teknik Informatika" />
                                <x-input-error :messages="$errors->get('major')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="nim" value="NIM" class="text-blue-900" />
                                    <x-text-input id="nim"
                                        class="block mt-1 w-full border-blue-200 focus:ring-blue-500 focus:border-blue-500"
                                        type="text" name="nim" :value="old('nim')" required
                                        placeholder="Nomor Induk" />
                                    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="semester" value="Semester" class="text-blue-900" />
                                    <x-text-input id="semester"
                                        class="block mt-1 w-full border-blue-200 focus:ring-blue-500 focus:border-blue-500"
                                        type="number" name="semester" :value="old('semester')" required
                                        placeholder="Contoh: 5" />
                                    <x-input-error :messages="$errors->get('semester')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-8">
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 text-lg shadow-lg">
                        Daftar Sekarang
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <p class="text-center text-gray-500 text-sm mt-6">
            &copy; {{ date('Y') }} Guestbook App. All rights reserved.
        </p>
    </div>
</x-guest-layout>
