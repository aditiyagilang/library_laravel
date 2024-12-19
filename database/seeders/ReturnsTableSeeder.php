<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReturnModel; // Ganti dengan model Anda untuk tabel pengembalian

class ReturnsTableSeeder extends Seeder
{
    public function run(): void
    {
        $returns = [
            ['borrowing_id' => 1, 'total_late' => 0, 'qty_less' => 0, 'qty_returned' => 2],
            ['borrowing_id' => 2, 'total_late' => 2, 'qty_less' => 1, 'qty_returned' => 0],
            ['borrowing_id' => 3, 'total_late' => 1, 'qty_less' => 0, 'qty_returned' => 3],
            ['borrowing_id' => 4, 'total_late' => 0, 'qty_less' => 0, 'qty_returned' => 1],
            ['borrowing_id' => 5, 'total_late' => 3, 'qty_less' => 1, 'qty_returned' => 1],
        ];

        foreach ($returns as $return) {
            ReturnModel::create($return);
        }
    }
}
