<?php

namespace Admin\Databases\Factories;

use Admin\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RoleFactory extends Factory
{
    protected static $namespace = 'Admin/Databases/Factories';

    protected $model = Role::class;

    public function definition(): array
    {
        return [
            Role::$Id          => $this->faker->uuid,
            Role::$Code        => 'SA',
            Role::$DisplayName => 'Super Admin',
        ];
    }
}
