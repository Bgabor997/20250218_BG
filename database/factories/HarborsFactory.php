<?php

namespace Database\Factories;

use App\Models\Harbor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HarborsFactory extends Factory
{
    protected $model = Harbor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake("hu")->city() . " kikötő",
            "capacity" => fake()->numberBetween(5, 20),
            "open" => fake()->boolean()
        ];
    }
}
