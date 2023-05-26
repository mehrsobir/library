<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_tg' => $this->faker->name(),
            'name_ru' => $this->faker->name(),
            'name_en' => $this->faker->name(),
            'education_id' => $this->faker->numberBetween(1,8),
            'position_id' => $this->faker->numberBetween(1,6),
            'institution_id' => $this->faker->numberBetween(1,3),
            'phone' => $this->faker->randomNumber(9, true),
            'email' => 'mmm@mm.tj'
        ];
    }
}
