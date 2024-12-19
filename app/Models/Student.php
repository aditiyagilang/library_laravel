<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'class',
        'student_code',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class, 'student_id');
    }
}
