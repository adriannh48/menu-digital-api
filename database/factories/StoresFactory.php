<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Stores;

class StoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'business'),
            'telephone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'link' => $this->faker->url()
        ];
    }
}
