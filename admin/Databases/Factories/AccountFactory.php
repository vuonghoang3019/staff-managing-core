<?php

namespace Admin\Databases\Factories;

use Admin\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AccountFactory extends Factory
{
    protected static $namespace = 'Admin/Databases/Factories';

    protected $model = User::class;

    public function definition(): array
    {
        return [
            User::$Id        => $this->faker->uuid,
            User::$Code      => 'admin',
            User::$Password  => bcrypt('123456a@'),
        ];
    }
}
