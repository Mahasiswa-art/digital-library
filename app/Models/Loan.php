<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'book_id',
        'loan_date',
        'return_date',
    ];

    // Relasi ke Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi ke Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
