<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Admin\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            User::$Id => Str::uuid(),
            User::$Code => 'admin',
            User::$Password => bcrypt('123456a@'),
            User::$DisplayName => 'admin'
        ]);
    }
}
