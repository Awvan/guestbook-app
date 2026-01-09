<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

/**
 * EventController (Admin Side)
 * * Controller ini menangani manajemen data Acara/Event secara keseluruhan.
 * * Fitur utama: CRUD Acara, Pencarian (Search), dan Filter.
 */
class EventController extends Controller
{
    /**
     * 1. INDEX (DAFTAR ACARA)
     * Menampilkan daftar acara dengan fitur Search dan Pagination.
     * * @param Request $request (Menangkap input pencarian)
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Memulai Query Builder
        // Kita tidak langsung pakai Event::all() karena kita butuh filter search & pagination
        $query = Event::query();

        // --- LOGIKA PENCARIAN (SEARCH) ---
        // Jika ada input 'search' dari URL (?search=koding)
        if ($request->has('search') && $request->search != null) {
            $search = $request->search;

            // Query: Cari judul yang MIRIP ($search) ATAU lokasi yang MIRIP ($search)
            // Operator 'like' dengan %...% artinya mencari teks yang mengandung kata kunci
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        }

        // --- URUTAN & PAGINATION ---
        // orderBy 'desc': Acara tanggal paling baru muncul di atas
        // paginate(10): Batasi 10 acara per halaman
        $events = $query->orderBy('event_date', 'desc')->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * 2. CREATE (FORM BUAT ACARA)
     * Menampilkan form pembuatan acara baru.
     * Penting: Kita harus kirim data kategori ($categories) untuk isi Dropdown.
     */
    public function create()
    {
        // Ambil semua kategori untuk opsi di element <select>
        $categories = EventCategory::all();

        return view('admin.events.create', compact('categories'));
    }

    /**
     * 3. STORE (SIMPAN ACARA)
     * Memvalidasi dan menyimpan data acara baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            // exists:event_categories,id = Pastikan ID kategori yang dipilih BENAR-BENAR ADA di tabel kategori
            // Ini untuk mencegah error Foreign Key Integrity
            'event_category_id' => 'required|exists:event_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date', // Harus format tanggal valid
            'location' => 'required',
            'quota' => 'required|integer|min:1', // Kuota minimal 1 orang
        ]);

        // Simpan data pakai Mass Assignment (aman karena sudah divalidasi)
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Acara berhasil dibuat!');
    }

    /**
     * 4. EDIT (FORM EDIT ACARA)
     * Menampilkan form edit dengan data yang sudah terisi sebelumnya.
     * * @param int $id (ID Acara)
     */
    public function edit($id)
    {
        // Cari acara, jika tidak ketemu tampilkan 404
        $event = Event::findOrFail($id);

        // Kita juga butuh list kategori lagi buat dropdown,
        // biar user bisa ganti kategori acara kalau mau.
        $categories = EventCategory::all();

        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * 5. UPDATE (SIMPAN PERUBAHAN)
     * Memperbarui data acara yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'event_category_id' => 'required|exists:event_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'quota' => 'required|integer|min:1',
        ]);

        // Method update() otomatis mengganti data lama dengan yang baru
        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Acara berhasil diperbarui!');
    }

    /**
     * 6. DESTROY (HAPUS ACARA)
     * Menghapus acara dari database.
     * * @param Event $event (Route Model Binding)
     * Laravel otomatis mencarikan data Event berdasarkan ID di URL.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Acara berhasil dihapus.');
    }
}
