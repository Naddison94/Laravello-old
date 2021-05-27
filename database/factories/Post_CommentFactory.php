<?php

namespace Database\Factories;

use App\Models\Post_Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Post_CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post_Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'  => 1,
            'post_id'  => 1,
            'body'     => $this->faker->sentence,
            'archived' => false
        ];
    }
}
