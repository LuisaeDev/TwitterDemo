<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{

    // Demonstrative videos
    private array $videos = [
        'https://www.youtube.com/watch?v=scJXVOPNQaM',
        'https://www.youtube.com/watch?v=cvxjT2y5sQo',
        'https://www.youtube.com/watch?v=3ZCXjUghgDg',
        'https://www.youtube.com/watch?v=vhDbN1WZMo8',
        'https://www.youtube.com/watch?v=wtkcADMkQwM',
        'https://www.youtube.com/watch?v=SLLocWmL5E4',
        'https://www.youtube.com/watch?v=sqtgBbem0iU',
        'https://www.youtube.com/watch?v=5sLHCU7AzIU',
        'https://www.youtube.com/watch?v=_Z7Yj09Cv1c',
        'https://www.youtube.com/watch?v=H5ij1KN267M',
        'https://www.youtube.com/watch?v=DQqJIZZ4d9o'
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
            'n_retweets' => rand(0, 15)
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