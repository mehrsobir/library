<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(3),
            'category_id' => $this->faker->numberBetween(1,17),
            'type_id' => $this->faker->numberBetween(1,6),
            'author_id' => $this->faker->numberBetween(1,10),
            'lang' => $this->faker->randomElement(['tg', 'ru', 'en']),
            'image' => '/images/be8IfkOv2aEH4xrWxKFDBZ0ItJcL5uNA99JkvZC6.jpg',
            'pub_place' => $this->faker->sentence(),
            'pub_date' => $this->faker->date(),
            'pub_link' => $this->faker->sentence()
        ];
    }
}
