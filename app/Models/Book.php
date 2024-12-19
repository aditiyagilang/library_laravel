<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'year',
        'author',
        'publisher',
        'stock',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class, 'book_id');
    }
}
