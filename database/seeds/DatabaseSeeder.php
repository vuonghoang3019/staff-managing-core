<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            User::$Id => '061c82c3-640b-4556-b6bb-5b8e7dffc7d0',
            User::$Code => 'admin',
            User::$Password => bcrypt('123456a@'),
            User::$DisplayName => 'admin'
        ]);
    }
}
