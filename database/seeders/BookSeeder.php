<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Laskar Pelangi', 'author_id' => 2, 'publisher_id' => 1],
            ['title' => 'Negeri Para Bedebah', 'author_id' => 1, 'publisher_id' => 2],
            ['title' => 'Bumi Manusia', 'author_id' => 3, 'publisher_id' => 3],
        ]);
    }
}
