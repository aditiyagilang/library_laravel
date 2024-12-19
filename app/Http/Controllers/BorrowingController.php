<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    // Menampilkan daftar peminjaman
    public function index()
    {
        $borrowings = Borrowing::with('student', 'book')->get();
        return view('borrowings.index', compact('borrowings'));
    }

    // Menampilkan form untuk menambah peminjaman
    public function create()
    {
        $students = Student::all();
        $books = Book::all();
        return view('borrowings.create', compact('students', 'books'));
    }

    // Menyimpan data peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'qty' => 'required|integer|min:1',
        ]);

        Borrowing::create($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit peminjaman
    public function edit($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $students = Student::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'students', 'books'));
    }

    // Mengupdate data peminjaman
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'qty' => 'required|integer|min:1',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    // Menghapus data peminjaman
    public function destroy($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
