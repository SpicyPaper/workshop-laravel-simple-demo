<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'Moule',
            'pages' => 200,
            'quantity' => 20,
        ]);

        DB::table('books')->insert([
            'title' => 'Coquillage',
            'pages' => 300,
            'quantity' => 30,
        ]);
    }
}
