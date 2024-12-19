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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul buku
            $table->text('description'); // Deskripsi buku
            $table->year('year'); // Tahun terbit
            $table->string('author'); // Nama penulis
            $table->string('publisher'); // Nama penerbit
            $table->integer('stock'); // Stok buku
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }

};
