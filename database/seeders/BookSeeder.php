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
                'title' => "Mon livre",
                'pages' => 10,
                'quantity' => 20,
            ],
            [
                'title' => "Livre de tom",
                'pages' => 1,
                'quantity' => 300,
            ],
            [
                'title' => "Livre de seb",
                'pages' => 1000,
                'quantity' => 30,
            ]
        ]);
    }
}
