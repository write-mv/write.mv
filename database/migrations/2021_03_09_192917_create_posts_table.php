<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->boolean('is_english')->default(false);
            $table->boolean('show_author')->default(true);
            $table->string('display_name')->default('anonymous');
            $table->string('featured_image')->nullable();
            $table->string('featured_image_caption')->nullable();
            $table->text('excerpt')->nullable();
            $table->json('content');
            $table->json('meta')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->boolean('published')->default(false);
            $table->dateTime('published_date')->default('2018-10-10 00:00:00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
