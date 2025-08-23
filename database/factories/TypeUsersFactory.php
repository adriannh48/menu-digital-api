<?php

namespace Database\Factories;

use App\Models\TypeUsers;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeUsersFactory extends Factory
{
    protected $model = TypeUsers::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
} 