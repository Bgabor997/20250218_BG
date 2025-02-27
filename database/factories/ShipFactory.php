<?php

namespace Database\Factories;

use App\Models\Harbor;
use App\Models\Ship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ship>
 */
class ShipFactory extends Factory
{
    protected $model = Ship::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->lastName("female"),
            "height" => fake()->randomFloat(1, 1, 5),
            "harbor_id" => fake()->randomElement([
                null,
                ...Harbor::get()->pluck("id")->toArray()
            ])
        ];
    }
}
