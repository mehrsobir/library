<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
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
            'annotation' => $this->faker->paragraph(),
            'category_id' => $this->faker->numberBetween(1,11),
            'author_id' => $this->faker->numberBetween(1,10),
            'pages' => $this->faker->randomDigit(),
            'lang' => $this->faker->randomElement(['tg', 'ru', 'en']),
            'pdf' => '/books/8TSQ2HtMqZF8eQCHQ32U5JDMwErFqDoU45TjN3DH.pdf',
            'image' => '/images/be8IfkOv2aEH4xrWxKFDBZ0ItJcL5uNA99JkvZC6.jpg',
            'pub_place' => $this->faker->sentence(),
            'pub_year' => 2022
        ];
    }
}
