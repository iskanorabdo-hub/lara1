<?php

namespace Database\Factories;

use App\Models\Parking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Parking>
 */
class ParkingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ville' => fake()->company(),
            'capacite' => fake()->numberbetween(123,123),
            'prix_heure' => fake()->numberbetween(123,123),

        ];
    }
}
