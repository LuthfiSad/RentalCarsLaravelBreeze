<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
  protected $model = Car::class;

  public function definition()
  {
    return [
      'name' => $this->faker->randomElement(['Toyota Avanza', 'Honda Jazz']),
      'model' => $this->faker->randomElement(['Avanza Veloz', 'Jazz RS']),
      'year' => $this->faker->randomElement([2021, 2019]),
      'license_plate' => $this->faker->bothify('??####'),
      'rental_price_per_day' => $this->faker->randomFloat(2, 500000, 1000000),
      'image' => null,
      'status' => $this->faker->randomElement(['available', 'not available']),
      'description' => $this->faker->sentence,
    ];
  }
}
