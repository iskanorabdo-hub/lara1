<?php

namespace Database\Factories;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoitureFactory extends Factory
{
    protected $model = Voiture::class;

   public function definition(): array
{
    return [
        'marque' => $this->faker->company(),
        'model' => $this->faker->word(), // OK maintenant
        'km' => $this->faker->numberBetween(1000, 200000),
        'parking_id'=> $this->faker->numberBetween(1,21),
    ];
}
}