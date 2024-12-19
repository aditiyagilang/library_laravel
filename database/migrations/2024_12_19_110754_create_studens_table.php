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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // ID unik untuk siswa
            $table->string('name'); // Nama siswa
            $table->string('address'); // Alamat siswa
            $table->string('phone'); // Nomor telepon siswa
            $table->string('class'); // Kelas siswa
            $table->string('student_code')->unique(); // Kode unik untuk siswa
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
    
};
