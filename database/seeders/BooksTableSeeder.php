<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([['title' => 'Il était dix','pages' => 244,'quantity' => 10],
        ['title' => 'Le Seigneur des Anneaux','pages' => 136,'quantity' => 15]]);
    }
}
