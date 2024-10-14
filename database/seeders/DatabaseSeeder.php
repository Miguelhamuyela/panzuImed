<?php

namespace Database\Seeders;

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
        \App\Models\AboutRoute::factory(1)->create();
        \App\Models\PerfilDirector::factory(1)->create();
        \App\Models\About::factory(1)->create();
        \App\Models\Donation::factory(1)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\Configuration::factory(1)->create();
    }
}
