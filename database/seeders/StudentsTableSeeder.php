<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['name' => 'Andi Wijaya', 'address' => 'Jl. Mawar No.10', 'phone' => '081234567890', 'class' => 'Kelas 10', 'student_code' => 'S1001'],
            ['name' => 'Budi Santoso', 'address' => 'Jl. Melati No.15', 'phone' => '081234567891', 'class' => 'Kelas 11', 'student_code' => 'S1002'],
            ['name' => 'Citra Dewi', 'address' => 'Jl. Anggrek No.12', 'phone' => '081234567892', 'class' => 'Kelas 12', 'student_code' => 'S1003'],
            ['name' => 'Dewi Lestari', 'address' => 'Jl. Kenanga No.20', 'phone' => '081234567893', 'class' => 'Kelas 10', 'student_code' => 'S1004'],
            ['name' => 'Eko Prasetyo', 'address' => 'Jl. Flamboyan No.5', 'phone' => '081234567894', 'class' => 'Kelas 11', 'student_code' => 'S1005'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
