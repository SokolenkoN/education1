<?php

namespace Database\Factories;

use App\Models\Fraction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fraction>
 */
class FractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected  $model = Fraction::class;
    public function definition()
    {
        return [
            'title' => $this->faker->userName,
            'description' => $this->faker->title,
        ];
    }
}
