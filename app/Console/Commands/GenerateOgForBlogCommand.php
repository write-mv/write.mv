<?php

namespace App\Console\Commands;

use App\Jobs\GenerateBlogOgImage;
use App\Models\Blog;
use Illuminate\Console\Command;

class GenerateOgForBlogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:blog-og';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Og image for all the blog';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Blog::all()->each(function ($item, $key) {
            GenerateBlogOgImage::dispatch($item);
        });
    }
}
