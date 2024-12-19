<?php

namespace App\Http\Controllers;

use App\Models\ReturnModel;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    // Menampilkan daftar pengembalian
    public function index()
    {
        $returns = ReturnModel::with('borrowing')->get(); // Mengambil semua data pengembalian beserta informasi peminjaman
        return view('returns.index', compact('returns')); // Menampilkan data pada view
    }

    // Menampilkan form untuk membuat pengembalian baru
    public function create()
    {
        // Mengambil semua peminjaman yang belum dikembalikan (jika diperlukan)
        $borrowings = Borrowing::all();
        // dd($borrowings);

        return view('returns.create', compact('borrowings'));
    }

    // Menyimpan data pengembalian
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'qty_returned' => 'required|numeric',
        ]);
    
        // Ambil data peminjaman berdasarkan borrowing_id
        $borrowing = Borrowing::findOrFail($request->borrowing_id);
    
        // Hitung jumlah keterlambatan
        $today = now(); // Tanggal hari ini
        $return_date = \Carbon\Carbon::parse($borrowing->return_date); // Tanggal pengembalian peminjaman
        $total_late = $today->diffInDays($return_date, false); // Menghitung selisih hari, negative jika tidak terlambat
    
        // Jika tidak terlambat, beri nilai 0
        if ($total_late < 0) {
            $total_late = 0;
        }
    
        // Hitung jumlah kurang (selisih qty dikembalikan dengan qty peminjaman)
        $qty_less = $borrowing->qty - $request->qty_returned;
        if ($qty_less < 0) {
            $qty_less = 0; // Tidak boleh negatif
        }
    
        // Menyimpan data pengembalian
        ReturnModel::create([
            'borrowing_id' => $request->borrowing_id,
            'total_late' => $total_late,
            'qty_less' => $qty_less,
            'qty_returned' => $request->qty_returned,
        ]);
    
        return redirect()->route('returns.index')->with('success', 'Pengembalian berhasil ditambahkan');
    }
    

    // Menampilkan form untuk mengedit data pengembalian
    public function edit($id)
    {
        $return = ReturnModel::findOrFail($id); // Mendapatkan data pengembalian berdasarkan ID
        $borrowings = Borrowing::all(); // Menampilkan semua peminjaman yang belum dikembalikan
        
        return view('returns.edit', compact('return', 'borrowings')); // Menampilkan form pengeditan
    }
    

    // Mengupdate data pengembalian
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'borrowing_id' => 'required|exists:borrowings,id',
            'qty_returned' => 'required|integer|min:0',
        ]);
    
        // Mencari pengembalian yang akan diupdate
        $return = ReturnModel::findOrFail($id);
        
        // Ambil data peminjaman terkait
        $borrowing = Borrowing::findOrFail($request->borrowing_id);
    
        // Hitung jumlah keterlambatan
        $today = now(); // Tanggal hari ini
        $return_date = \Carbon\Carbon::parse($borrowing->return_date); // Tanggal pengembalian peminjaman
        $total_late = $today->diffInDays($return_date, false); // Menghitung selisih hari, negative jika tidak terlambat
    
        // Jika tidak terlambat, beri nilai 0
        if ($total_late < 0) {
            $total_late = 0;
        }
    
        // Hitung jumlah kurang (selisih qty dikembalikan dengan qty peminjaman)
        $qty_less = $borrowing->qty - $request->qty_returned;
        if ($qty_less < 0) {
            $qty_less = 0; // Tidak boleh negatif
        }
    
        // Mengupdate data pengembalian
        $return->update([
            'borrowing_id' => $request->borrowing_id,
            'total_late' => $total_late,
            'qty_less' => $qty_less,
            'qty_returned' => $request->qty_returned,
        ]);
    
        return redirect()->route('returns.index')->with('success', 'Pengembalian berhasil diperbarui.');
    }
    

    // Menghapus data pengembalian
    public function destroy($id)
    {
        $return = ReturnModel::findOrFail($id); // Mencari pengembalian yang akan dihapus
        $return->delete(); // Menghapus data pengembalian

        return redirect()->route('returns.index')->with('success', 'Pengembalian berhasil dihapus.');
    }
}
