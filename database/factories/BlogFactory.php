<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->name,
            'title' => $this->faker->sentence($nbWords=4, $variableNbWords=true),
            'email' => $this->faker->unique()->safeEmail,
            'content' => $this->faker->paragraph,
            'country' => $this->faker->country,
            'publish_date' =>$this->faker->dateTime($max = 'now', $timezone = null)
            
        ];
    }
}
