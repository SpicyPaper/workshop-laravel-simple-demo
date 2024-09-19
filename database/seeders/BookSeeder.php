<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('books')->insert([
            [
                'title' => 'Livre 1',
                'pages' => 100,
                'quantity' => 10,
            ],
            [
                'title' => 'Livre 2',
                'pages' => 200,
                'quantity' => 20,
            ],
            [
                'title' => 'Livre 3',
                'pages' => 300,
                'quantity' => 30,
            ],
        ]);
    }
}
