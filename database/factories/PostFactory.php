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
            'title'       => 'This is the first post',
            'excerpt'     => 'DB:Seed',
            'body'        => 'This is the first post made to my site. This post was added via a the DB:Seed command',
            'img'         => 'default_image.jpg',
            'user_id'     => 1,
            'category_id' => 1,
        ];
    }
}
