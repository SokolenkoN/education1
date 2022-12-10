<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Fraction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected  $model = Character::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => random_int(18, 93),
            'biography' => $this->faker->text,
            'obituary' => '',
            'health' => $this->faker->randomElement($array = ['Жив', 'Мёртв']),
            'fraction_id' => Fraction::get()->random()->id,
        ];
    }
}
