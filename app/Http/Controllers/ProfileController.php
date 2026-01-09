<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/*
 * ProfileController
 * * Controller ini menangani manajemen profil pengguna yang sedang login.
 * * Fitur: Edit Profil (Nama/Email) dan Hapus Akun.
 */
class ProfileController extends Controller
{
    /*
     * 1. EDIT PROFIL (FORM)
     * Menampilkan formulir untuk mengubah data diri user.
     */
    public function edit(Request $request): View
    {
        // Menampilkan view 'profile.edit'
        // Kita kirim data user yang sedang login ($request->user()) agar form terisi otomatis.
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /*
     * 2. UPDATE PROFIL (SIMPAN PERUBAHAN)
     * Menangani logika penyimpanan perubahan nama atau email.
     * Menggunakan 'ProfileUpdateRequest' untuk validasi (Custom Request).
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi model User dengan data yang sudah divalidasi
        $request->user()->fill($request->validated());

        // --- LOGIKA KEAMANAN EMAIL ---
        // $user->isDirty('email'): Mengecek apakah user mengubah emailnya?
        if ($request->user()->isDirty('email')) {
            // Jika email berubah, kita set 'email_verified_at' jadi NULL.
            // Artinya: User harus verifikasi ulang email barunya (jika fitur verifikasi aktif).
            $request->user()->email_verified_at = null;
        }

        // Simpan perubahan ke database
        $request->user()->save();

        // Redirect kembali dengan pesan status (bisa dipakai untuk notifikasi "Profil Diperbarui")
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /*
     *3. DESTROY (HAPUS AKUN)
     * Menghapus akun user secara permanen.
     * Proses ini butuh validasi password demi keamanan.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi Password:
        // Sebelum hapus, user WAJIB masukkan password saat ini ('current_password')
        // Ini untuk mencegah orang iseng menghapus akun jika laptop ditinggal terbuka.
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // 1. Logout user dari sistem
        Auth::logout();

        // 2. Hapus data user dari database
        $user->delete();

        // 3. Bersihkan Sesi (Security Best Practice)
        // invalidate(): Menghancurkan sesi saat ini agar tidak bisa dipakai lagi.
        $request->session()->invalidate();
        // regenerateToken(): Membuat CSRF token baru untuk sesi pengunjung umum (guest).
        $request->session()->regenerateToken();

        // Redirect ke halaman utama (Landing Page)
        return Redirect::to('/');
    }
}
