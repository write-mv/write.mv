<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Team;
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

        Post::factory(5)->create([
            "blog_id" => null,
            "user_id" => null,
            "team_id" => null
        ]);
    }
}
