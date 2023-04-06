<?php

namespace Hyvor\LaravelFactoryCommand\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{

    protected $model = User::class;

    public function definition()
    {
        return [
            'id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
        ];
    }
}