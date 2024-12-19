<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrowing;

class BorrowingsTableSeeder extends Seeder
{
    public function run(): void
    {
        $borrowings = [
            ['student_id' => 1, 'book_id' => 1, 'borrow_date' => '2024-12-01', 'return_date' => '2024-12-07', 'qty' => 2],
            ['student_id' => 2, 'book_id' => 2, 'borrow_date' => '2024-12-02', 'return_date' => '2024-12-08', 'qty' => 1],
            ['student_id' => 3, 'book_id' => 3, 'borrow_date' => '2024-12-03', 'return_date' => '2024-12-09', 'qty' => 3],
            ['student_id' => 4, 'book_id' => 4, 'borrow_date' => '2024-12-04', 'return_date' => '2024-12-10', 'qty' => 1],
            ['student_id' => 5, 'book_id' => 5, 'borrow_date' => '2024-12-05', 'return_date' => '2024-12-11', 'qty' => 2],
        ];

        foreach ($borrowings as $borrowing) {
            Borrowing::create($borrowing);
        }
    }
}
