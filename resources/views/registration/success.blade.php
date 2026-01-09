<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md mt-10 text-center">
        <h2 class="text-2xl font-bold text-green-600 mb-4">Pendaftaran Berhasil!</h2>
        <p class="mb-6">Halo {{ $registration->name }}, simpan QR Code di bawah ini untuk discan saat masuk acara.</p>

        <div class="flex justify-center mb-6 p-4 bg-gray-50 rounded-lg">
            {!! QrCode::size(250)->generate($registration->qr_code_token) !!}
        </div>

        <div class="mt-6 text-center">
            <h3 class="text-lg font-medium text-gray-900">Pendaftaran Berhasil!</h3>
            <p class="mt-2 text-sm text-gray-600">
                Silakan unduh tiket Anda dan tunjukkan QR Code kepada panitia saat kedatangan.
            </p>

            <a href="{{ route('ticket.download', $registration->qr_code_token) }}"
                class="mt-4 inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 transition ease-in-out duration-150 shadow-lg">

                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Download E-Ticket (PDF)
            </a>
        </div>

        <div class="mt-6">
            <a href="/" class="text-blue-600 hover:underline text-sm">Kembali ke Beranda</a>
        </div>
    </div>
</x-guest-layout>
