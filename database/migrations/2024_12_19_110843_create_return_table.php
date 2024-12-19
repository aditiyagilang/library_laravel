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
    Schema::create('returns', function (Blueprint $table) {
        $table->id(); // ID unik untuk pengembalian
        $table->foreignId('borrowing_id')->constrained('borrowings')->onDelete('cascade'); // Relasi ke tabel borrowings
        $table->integer('total_late')->default(0); // Total keterlambatan (dalam hari)
        $table->integer('qty_less')->default(0); // Jumlah buku yang kurang dikembalikan
        $table->integer('qty_returned')->default(0); // Jumlah buku yang dikembalikan
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

public function down(): void
{
    Schema::dropIfExists('returns');
}

};
