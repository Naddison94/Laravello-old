<?php


namespace Database\Factories;

use App\Models\Post_Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Post_CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post_Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'  => 1,
            'title'     => $this->faker->text,
            'archived' => false
        ];
    }
}
