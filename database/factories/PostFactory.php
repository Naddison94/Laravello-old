<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->text,
            'excerpt'     => $this->faker->text,
            'body'        => $this->faker->text,
            'img'         => $this->faker->image(),
            'user_id'     => 1,
            'category_id' => 1,
            'archived'    => false
        ];
    }
}