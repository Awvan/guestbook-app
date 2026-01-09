<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

/**
 * EventCategoryController
 * * Controller ini menangani fitur CRUD (Create, Read, Update, Delete)
 * untuk Master Data Kategori Acara (misal: Seminar, Workshop, Lomba).
 * Hanya bisa diakses oleh Admin.
 */
class EventCategoryController extends Controller
{
    /**
     * 1. INDEX (READ)
     * Menampilkan daftar semua kategori dengan pagination.
     * * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data terbaru (latest) dan membatasi 10 data per halaman (paginate)
        // Gunanya agar halaman tidak berat jika datanya sudah ribuan.
        $categories = EventCategory::latest()->paginate(10);

        // Mengirim variabel $categories ke view 'admin.categories.index'
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * 2. STORE (CREATE)
     * Menyimpan data kategori baru ke database.
     * * @param  Request $request (Data dari form)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi: Nama wajib diisi, berupa string, dan maks 255 karakter
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Mass Assignment: Simpan semua data dari form langsung ke database
        // Pastikan 'name' sudah ada di $fillable pada Model EventCategory
        EventCategory::create($request->all());

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * 3. EDIT (READ SINGLE)
     * Menampilkan form edit untuk satu kategori spesifik.
     * * @param  int $id (ID Kategori yang mau diedit)
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // findOrFail: Cari berdasarkan ID. Jika tidak ada, otomatis tampilkan Error 404.
        // Ini lebih aman daripada find() biasa yang bisa menyebabkan error program.
        $category = EventCategory::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * 4. UPDATE (UPDATE)
     * Memperbarui data kategori yang sudah ada.
     * * @param  Request $request (Data baru dari form)
     * @param  int $id (ID Kategori yang diedit)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validasi ulang inputan (Best Practice: selalu validasi input user)
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Cari data lama, lalu update dengan data baru
        EventCategory::findOrFail($id)->update($request->all());

        // Redirect ke halaman index (Daftar Kategori) agar user melihat perubahannya
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * 5. DESTROY (DELETE)
     * Menghapus data kategori dari database secara permanen.
     * * @param  int $id (ID Kategori yang akan dihapus)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari data dan langsung hapus
        EventCategory::findOrFail($id)->delete();

        // Kembali ke halaman sebelumnya
        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}
