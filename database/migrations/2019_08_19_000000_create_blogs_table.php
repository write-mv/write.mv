<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('site_title');
            $table->text('description')->nullable();
            $table->string('url');
            $table->string('rss_feed_link')->nullable();
            $table->unsignedBigInteger('team_id');
            $table->json('social_links')->nullable()
            $table->json('notification_channels')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
