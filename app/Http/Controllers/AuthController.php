<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Book;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Fungsi untuk melakukan login
    public function login(Request $request)
{
    // Validasi data yang diterima
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Cek apakah email dan password cocok
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // Menyimpan ID pengguna di session secara eksplisit
        $user = Auth::user(); // Mendapatkan user yang sedang login
        session(['users_id' => $user->id]);

        // Jika login berhasil, arahkan ke halaman dashboard atau halaman yang diinginkan
        return redirect('/')->with('success', 'Login berhasil!');
    }

    // Jika login gagal, kembali dengan pesan error
    return back()->withErrors([
        'email' => 'Email atau password yang Anda masukkan salah.',
    ]);
}

    // Fungsi untuk melakukan logout
    public function logout()
    {
        // Logout pengguna
        Auth::logout();

        // Hapus data sesi
        request()->session()->invalidate();

        // Regenerasi sesi untuk keamanan
        request()->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('login.form')->with('success', 'Anda berhasil logout.');
    }



    public function dashboard()
{
    // Mendapatkan jumlah siswa dan jumlah buku
    $jumlahSiswa = User::count(); // Misalnya, menggunakan model User untuk jumlah siswa
    $jumlahBuku = Book::count();  // Misalnya, menggunakan model Book untuk jumlah buku

    return view('home', compact('jumlahSiswa', 'jumlahBuku'));
}

}
