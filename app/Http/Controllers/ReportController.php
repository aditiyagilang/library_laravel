<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Fungsi untuk mendownload laporan peminjaman dalam bentuk PDF
    public function downloadBorrowingReport()
    {
        // Ambil data peminjaman
        $borrowings = Borrowing::with(['student', 'book'])->get();

        // Load view untuk laporan peminjaman
        $pdf = Pdf::loadView('reports.pdf_borrowing_report', compact('borrowings'));

        // Download PDF
        return $pdf->download('laporan_peminjaman.pdf');
    }

    // Fungsi untuk mendownload laporan data siswa dalam bentuk PDF
    public function downloadStudentReport()
    {
        // Ambil data siswa
        $students = Student::all();

        // Load view untuk laporan siswa
        $pdf = Pdf::loadView('reports.pdf_student_report', compact('students'));

        // Download PDF
        return $pdf->download('laporan_siswa.pdf');
    }
}
