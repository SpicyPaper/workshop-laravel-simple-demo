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
        \App\Models\Book::create([
            'title' => 'Le Seigneur des Anneaux',
            'pages' => 1200,
            'quantity' => 5
        ]);
        \App\Models\Book::create([
            'title' => 'Harry Potter',
            'pages' => 800,
            'quantity' => 3
        ]);
        \App\Models\Book::create([
            'title' => 'Le Petit Prince',
            'pages' => 100,
            'quantity' => 10
        ]);
    }
}
