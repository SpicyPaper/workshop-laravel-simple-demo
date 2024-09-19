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
            [
            'title' => 'The Master and Margarita',
            'pages' => 384,
            'quantity' => 10,
            ],
            [
            'title' => '1984',
            'pages' => 328,
            'quantity' => 15,
            ],
            [
            'title' => 'Moby Dick',
            'pages' => 635,
            'quantity' => 5,
            ],
        ]);

    }
}
