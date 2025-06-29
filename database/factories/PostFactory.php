<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Team;
use App\Models\User;
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
            'title' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->sentence()),
            'excerpt' => $this->faker->sentence(),
            'content' => '{
                "ops": [
                  {
                    "insert": "get nae naed\n"
                  }
                ]
              }',
            'meta' => [],
            'blog_id' => Blog::factory(),
            'user_id' => User::factory(),
            'team_id' => Team::factory(),
            'is_english' => true,
            'published' => false,
            'published_date' => $this->faker->dateTime(),
        ];
    }
}
