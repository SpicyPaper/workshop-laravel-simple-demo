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
        \App\Models\Book::truncate();

        $books = [
            ['title' => 'Hunter x Hunter n°1', "author" => "Jean Sérien", 'pages' => 110, 'quantity' => 1],
            ['title' => 'Hunter x Hunter n°2', "author" => "Jean Sérien", 'pages' => 87, 'quantity' => 10],
            ['title' => 'Harry and the Poter', "author" => "Jean Sérien", 'pages' => 123, 'quantity' => 11],
            ['title' => 'Youpi Lands', "author" => "Unknown", 'pages' => 9, 'quantity' => 0]
        ];

        foreach ($books as $book){
            \App\Models\Book::create(array(
                'title' => $book["title"],
                'author' => $book["author"],
                'pages' => $book["pages"],
                'quantity' => $book["quantity"]
            ));
        }
    }
}
