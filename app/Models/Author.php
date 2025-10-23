<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    // Relasi: satu author punya banyak buku
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
