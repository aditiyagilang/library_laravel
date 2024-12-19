<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    use HasFactory;

    protected $table = 'returns';

    protected $fillable = [
        'borrowing_id',
        'total_late',
        'qty_less',
        'qty_returned',
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class, 'borrowing_id');
    }
}
