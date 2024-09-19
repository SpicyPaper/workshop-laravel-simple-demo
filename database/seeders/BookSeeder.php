<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Book::create([
            'title' => 'Le seigneur des anneaux',
            'pages' => 1000,
            'quantity' => 10,
        ]);

        \App\Models\Book::create([
            'title' => 'Harry Potter',
            'pages' => 500,
            'quantity' => 5,
        ]);

        \App\Models\Book::create([
            'title' => 'Le petit prince',
            'pages' => 100,
            'quantity' => 20,
        ]);

        \App\Models\Book::create([
            'title' => 'Le rouge et le noir',
            'pages' => 300,
            'quantity' => 15,
        ]);

        \App\Models\Book::create([
            'title' => 'Les misérables',
            'pages' => 800,
            'quantity' => 8,
        ]);
    }
}
