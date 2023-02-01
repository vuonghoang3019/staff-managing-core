<?php

namespace Admin\Databases\Seeders;

use Admin\Models\User;
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
         User::factory()->create([
             User::$Id        => $this->faker->uuid,
             User::$Code      => 'admin',
             User::$Password  => bcrypt('123456a@'),
         ]);
    }
}
