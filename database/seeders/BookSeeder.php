<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => "Livre 1",
            'pages' => 42,
            'quantity' => 5,
        ]);
        DB::table('books')->insert([
            'title' => Str::random(10),
            'pages' => 132,
            'quantity' => 2,
        ]);
    }
}
