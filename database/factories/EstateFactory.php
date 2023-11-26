<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estate>
 */
class EstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {     
        return [
            'title' => $this->faker->company() . ' ' . $this->faker->randomNumber(1) . strtoupper(Str::random(1)) ,
            'address' => $this->faker->streetName(),
            'state' => 'En obra',
            'amount' => $this->faker->randomNumber(4)
        ];
    }
}
