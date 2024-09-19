<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::insert([
            [
                'title' => 'Il était dix',
                'pages' => 244,
                'quantity' => 45
            ],
            [
                'title' => 'Le Seigneur des Anneaux',
                'pages' => 20000,
                'quantity' => 42
            ],
            [
                'title' => 'WorkShop Laravel',
                'pages' => 300,
                'quantity' => 13
            ]
        ]);
    }
}
