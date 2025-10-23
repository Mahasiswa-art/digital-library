<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'publisher_id',
    ];

    // Relasi ke Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Relasi ke Publisher
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // Relasi ke Loan
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
