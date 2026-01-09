<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Scanner Kehadiran
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg text-center">

                <div class="mb-6 text-left">
                    <label for="event_select" class="block text-sm font-medium text-gray-700 mb-2">Pilih Acara yang Sedang
                        Berjalan:</label>
                    <select id="event_select"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" class="text-center">-- Pilih Acara --</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">
                                {{ $event->title }} ({{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }})
                            </option>
                        @endforeach
                    </select>
                    <p id="error-msg" class="text-red-500 text-sm mt-1 hidden">⚠ Harap pilih acara terlebih dahulu!</p>
                </div>

                <div id="reader" width="600px"
                    class="mx-auto bg-gray-100 rounded-lg overflow-hidden border-2 border-dashed border-gray-300 relative">
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <span class="text-gray-400 opacity-50 text-4xl font-bold">[ ]</span>
                    </div>
                </div>

                <p class="text-gray-500 text-sm mt-4">Pastikan acara sudah dipilih sebelum scan.</p>

                <div class="mt-6 pt-6 border-t">
                    <p class="text-xs text-gray-400 mb-2">Masalah kamera? Input Token:</p>
                    <div class="flex justify-center gap-2">
                        <input type="text" id="manual-token" class="border rounded px-3 py-1 text-sm w-full max-w-xs"
                            placeholder="Token QR...">
                        <button onclick="manualScan()"
                            class="bg-indigo-600 text-white px-4 py-1 rounded text-sm hover:bg-indigo-700">Cek</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const csrfToken = "{{ csrf_token() }}";

        // Fungsi Utama Scan
        function processScan(token) {
            const eventId = document.getElementById('event_select').value;
            const errorMsg = document.getElementById('error-msg');

            // Cek apakah Admin sudah pilih acara
            if (!eventId) {
                errorMsg.classList.remove('hidden');
                // Beri efek getar/animasi pada dropdown agar admin sadar
                document.getElementById('event_select').classList.add('ring-2', 'ring-red-500');
                return;
            } else {
                errorMsg.classList.add('hidden');
                document.getElementById('event_select').classList.remove('ring-2', 'ring-red-500');
            }

            // Hentikan scan sementara
            if (html5QrcodeScanner) html5QrcodeScanner.clear();

            // Kirim token + event_id ke server
            fetch("{{ route('scan.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken
                    },
                    body: JSON.stringify({
                        qr_code_token: token,
                        event_id: eventId // <--- PENTING: Kirim ID Acara
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: 'SUKSES!',
                            text: data.message,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => restartScanner());
                    } else {
                        Swal.fire({
                            title: 'GAGAL!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonColor: '#d33',
                        }).then(() => restartScanner());
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Terjadi kesalahan server', 'error').then(() => restartScanner());
                });
        }

        // Helper: Restart Scanner/Reload
        function restartScanner() {
            location.reload();
        }

        // Helper: Manual Scan
        function manualScan() {
            const token = document.getElementById('manual-token').value;
            if (token) processScan(token);
        }

        // Inisialisasi Scanner
        function onScanSuccess(decodedText, decodedResult) {
            processScan(decodedText);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: 250
        });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</x-app-layout>
