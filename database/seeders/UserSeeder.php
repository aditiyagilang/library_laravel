<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan pengguna dengan data statis
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'address' => 'Jl. Raya No. 1, Jakarta',
            'phone' => '081234567890',
            'password' => 'password123', // Password harus menggunakan bcrypt di model
        ]);

    }
}
