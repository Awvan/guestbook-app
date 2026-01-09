<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100">

    <div x-data="{ sidebarOpen: window.innerWidth >= 768 }" class="flex h-screen overflow-hidden">

        <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="-translate-x-full opacity-0"
            class="w-64 bg-indigo-800 text-white flex-shrink-0 flex flex-col shadow-xl z-20 absolute md:relative h-full">

            <div class="h-16 flex items-center justify-center border-b border-indigo-700 bg-indigo-900">
                <div class="flex items-center gap-2 font-bold tracking-wider text-xl">
                    <span>ADMIN PANEL</span>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}"
                class="p-4 border-b border-indigo-700 flex items-center gap-3 bg-indigo-800/50 hover:bg-indigo-900 transition cursor-pointer group">

                <div
                    class="w-10 h-10 rounded-full bg-white text-indigo-800 flex items-center justify-center text-lg font-bold shadow group-hover:bg-indigo-100 transition">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>

                <div class="overflow-hidden">
                    <p class="text-sm font-semibold truncate group-hover:text-white transition">{{ Auth::user()->name }}
                    </p>
                    <div class="flex items-center gap-1 text-xs text-indigo-300 group-hover:text-indigo-200">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Edit Profil & Sandi</span>
                    </div>
                </div>
            </a>

            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1">

                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-6 py-3 hover:bg-indigo-700 transition {{ request()->routeIs('dashboard') ? 'bg-indigo-700 border-l-4 border-white' : 'border-l-4 border-transparent' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center px-6 py-3 hover:bg-indigo-700 transition {{ request()->routeIs('categories.*') ? 'bg-indigo-700 border-l-4 border-white' : 'border-l-4 border-transparent' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            Kategori Acara
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('events.index') }}"
                            class="flex items-center px-6 py-3 hover:bg-indigo-700 transition {{ request()->routeIs('events.*') ? 'bg-indigo-700 border-l-4 border-white' : 'border-l-4 border-transparent' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Kelola Acara
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.participants') }}"
                            class="flex items-center px-6 py-3 hover:bg-indigo-700 transition {{ request()->routeIs('admin.participants') ? 'bg-indigo-700 border-l-4 border-white' : 'border-l-4 border-transparent' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            Daftar Peserta
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('scan.index') }}"
                            class="flex items-center px-6 py-3 hover:bg-indigo-700 transition {{ request()->routeIs('scan.index') ? 'bg-indigo-700 border-l-4 border-white' : 'border-l-4 border-transparent' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2v4h2v-4zM6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Scan QR Code
                        </a>
                    </li>

                </ul>
            </nav>

            <div class="p-4 border-t border-indigo-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition text-sm font-bold shadow-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col h-screen overflow-hidden transition-all duration-300">

            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-4 sm:px-6 z-10 border-b">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="text-gray-500 hover:text-indigo-600 focus:outline-none transition-transform active:scale-95">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <h2 class="text-xl font-bold text-gray-800 hidden sm:block">
                        @if (isset($header))
                            {{ $header }}
                        @else
                            Dashboard
                        @endif
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full border border-gray-200">
                        {{ now()->format('d M Y') }}
                    </span>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                {{ $slot }}
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Cek apakah ada session 'success' dari Controller
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Cek apakah ada session 'error'
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
            });
        @endif

        // Konfirmasi Hapus (Tambahkan class 'btn-delete' di tombol hapus kamu nanti)
        document.addEventListener('click', function(e) {
            if (e.target && e.target.closest('.btn-delete')) {
                e.preventDefault();
                let form = e.target.closest('form');

                Swal.fire({
                    title: 'Yakin mau hapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    </script>
</body>

</html>
