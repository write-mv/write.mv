<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'team_id' => Team::factory(),
            'slug' => Str::slug($this->faker->word()),
            'description' => $this->faker->paragraph(),
        ];
    }
}
