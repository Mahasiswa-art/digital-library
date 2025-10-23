<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'Tere Liye', 'address' => 'Jakarta'],
            ['name' => 'Andrea Hirata', 'address' => 'Belitung'],
            ['name' => 'Pramoedya Ananta Toer', 'address' => 'Blora'],
        ]);
    }
}
