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
                'title' => 'Book One',
                'pages' => 150,
                'quantity' => 10,
            ],
            [
                'title' => 'Book Two',
                'pages' => 200,
                'quantity' => 5,
            ],
            [
                'title' => 'Book Three',
                'pages' => 300,
                'quantity' => 20,
            ],
        ]);
    }
}
