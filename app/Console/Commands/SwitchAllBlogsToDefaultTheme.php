<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class SwitchAllBlogsToDefaultTheme extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:default';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Switch all the blogs to default theme.';

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
        Blog::all()->each(function ($blog) {
            $blog->update([
                'theme_id' => 1,
            ]);
        });

        $this->info('All blogs changed to default theme.');
    }
}
