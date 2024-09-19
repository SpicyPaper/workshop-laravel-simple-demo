<?php
// les "seed" sont des données placée dans une base de données à la création de cette base,
// car les bases de données ne peuvent pas être utilisé corectement quand vide.

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

// TODO-3-4 DONE Créer le seeder "BookSeeder" --> php artisan...
// TODO-3-5 DONE Rajouter quelques livres
// TODO-3-7 DONE Exécuter le seeder --> php artisan...

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();

        \App\Models\User::factory(10)->create();
        // TODO-3-6 DONE Ajouter le seeder "BookSeeder" ici en utilisant "$this->call(...)"
        $this->call(BookSeeder::class);
    }
}
