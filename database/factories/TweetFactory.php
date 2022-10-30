<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{

    // Demonstrative videos
    private array $videos = [
        'https://www.youtube.com/embed/scJXVOPNQaM',
        'https://www.youtube.com/embed/cvxjT2y5sQo',
        'https://www.youtube.com/embed/3ZCXjUghgDg',
        'https://www.youtube.com/embed/vhDbN1WZMo8',
        'https://www.youtube.com/embed/wtkcADMkQwM',
        'https://www.youtube.com/embed/SLLocWmL5E4',
        'https://www.youtube.com/embed/sqtgBbem0iU',
        'https://www.youtube.com/embed/5sLHCU7AzIU',
        'https://www.youtube.com/embed/_Z7Yj09Cv1c',
        'https://www.youtube.com/embed/H5ij1KN267M',
        'https://www.youtube.com/embed/DQqJIZZ4d9o'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'uuid' => $this->faker->unique()->uuid(),
            'type' => $this->faker->randomElement(['msj', 'img', 'vid']),
            'message' => $this->faker->text('280'),
            'n_comments' => rand(0, 75),
            'n_likes' => rand(0, 200),
            'n_retweets' => rand(0, 15),
            'created_at'=> $this->faker->dateTimeBetween("-1 month" , now()),
        ];
    }

    /**
    * Indicate the ref according to the tweet type.
    *
    * @return \Illuminate\Database\Eloquent\Factories\Factory
    */
    public function randomType()
    {
        return $this->state(function (array $attributes) {

            switch($attributes['type']) {
                case 'img':
                    $attributes['ref'] = $this->faker->imageUrl(1200, 800, 'image', true);
                    break;
                case 'vid':
                    $attributes['ref'] = $this->faker->randomElement($this->videos);
                    break;
            }
            return $attributes;
        });
    }
}