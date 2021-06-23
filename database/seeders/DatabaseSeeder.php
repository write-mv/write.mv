<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Team;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $team  = Team::factory()->create();

        $user = \App\Models\User::factory()->create(['team_id' => $team->id]);
        $blog = Blog::factory()->create(['team_id' => $team->id]);

        Post::factory(50)->create([
            "published" => true,
            "blog_id" => $blog->id,
            "user_id" => $user->id,
            "team_id" => $team->id
        ]);

        Post::factory(50)->create([
            "blog_id" => $blog->id,
            "user_id" => $user->id,
            "team_id" => $team->id
        ]);

        /*
        $faker = \Faker\Factory::create();

        foreach(range(1,3000) as $range)
        {
            View::create([
                "viewable_type" => "App\Models\Post",
                "viewable_id" => 1,
                "visitor" => "99be1bcc-f31f-3bd5-8b1c-49a3f656be19",
                "viewed_at" => $faker->dateTimeBetween('-5 months')
            ]);
        }

        */
        
    }
}
