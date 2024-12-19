<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $table = 'borrowings';

    protected $fillable = [
        'student_id',
        'book_id',
        'borrow_date',
        'return_date',
        'qty',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function return()
    {
        return $this->hasOne(ReturnModel::class, 'borrowing_id');
    }
}
