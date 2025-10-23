<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('publishers')->insert([
            ['name' => 'Gramedia', 'address' => 'Jakarta'],
            ['name' => 'Mizan', 'address' => 'Bandung'],
            ['name' => 'Bentang Pustaka', 'address' => 'Yogyakarta'],
        ]);
    }
}
