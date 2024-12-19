<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id(); // ID unik untuk peminjaman
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // Relasi ke tabel books
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Relasi ke tabel students
            $table->date('borrow_date'); // Tanggal pinjam
            $table->date('return_date'); // Tanggal kembali
            $table->integer('qty'); // Jumlah buku yang dipinjam
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }

};
