<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
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
            'category_id' => $this->faker->numberBetween(1,10),
            'keywords' => $this->faker->words(5, true),
            'author_id' => $this->faker->numberBetween(1,10),
            'pages' => $this->faker->randomDigit(),
            'lang' => $this->faker->randomElement(['tg', 'ru', 'en']),
            'pdf' => '/pdf/csb20Yfk0wd4yU077DlG8tgldaGNPK0bUOnQOvlb.pdf',
            'pub_place' => $this->faker->sentence(),
            'pub_date' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now')->format("Y-m-d"),
            'pub_link' => $this->faker->sentence()
        ];
    }
}
