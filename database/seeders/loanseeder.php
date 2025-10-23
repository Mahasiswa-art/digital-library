<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('loans')->insert([
            ['member_id' => 1, 'book_id' => 1, 'loan_date' => '2025-10-01', 'return_date' => '2025-10-10'],
            ['member_id' => 2, 'book_id' => 2, 'loan_date' => '2025-10-05', 'return_date' => null],
        ]);
    }
}
