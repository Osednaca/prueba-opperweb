<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\Comentarios;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Posts::factory(5)->create();
        Comentarios::factory(5)->create();
    }
}
