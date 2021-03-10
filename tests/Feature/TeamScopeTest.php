<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TeamScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

     /** @test */
    public function a_model_has_team_id_on_the_migration()
    {
        $now = now();
        $this->artisan('make:model Test -m');

        //find the migration file and check if it has a team_id

        $filename = $now->year . '_' . $now->format('m') . '-' . $now->format('d') . '_' . $now->format('h') . $now->format('i') . $now->format('s').'_create_tests_table.php';

        $this->assertTrue(File::exists(database_path('migrations/'.$filename)));
        $this->assertStringContainsString('$table->uuid(\'team_id\')->index();',
        File::get(database_path('migrations/'.$filename)));
        //cleanup
        File::delete(database_path('migrations/'.$filename));
        File::delete(app_path('Models/Test.php'));
    }
}
