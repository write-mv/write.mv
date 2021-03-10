<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            "name" => $this->faker->name,
            "site_title" => $this->faker->name,
            "description" => $this->faker->paragraph,
            "url" => url("/".Str::slug($this->faker->name)),
            "rss_feed_link" =>  url("/".$this->faker->name."/feed"),
            "team_id" => Team::factory()
        ];
    }
}
