<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Pemrograman PHP', 'description' => 'Belajar dasar-dasar PHP.', 'year' => '2020', 'author' => 'John Doe', 'publisher' => 'TechBooks', 'stock' => 20],
            ['title' => 'Framework Laravel', 'description' => 'Panduan lengkap Laravel.', 'year' => '2021', 'author' => 'Jane Smith', 'publisher' => 'CodePress', 'stock' => 15],
            ['title' => 'Web Development', 'description' => 'Langkah membuat web modern.', 'year' => '2019', 'author' => 'Robert Brown', 'publisher' => 'WebBooks', 'stock' => 25],
            ['title' => 'Database MySQL', 'description' => 'Konsep dan implementasi MySQL.', 'year' => '2018', 'author' => 'Michael Johnson', 'publisher' => 'DataBooks', 'stock' => 30],
            ['title' => 'Algoritma dan Struktur Data', 'description' => 'Pemahaman algoritma.', 'year' => '2022', 'author' => 'David Wilson', 'publisher' => 'AlgoBooks', 'stock' => 10],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
