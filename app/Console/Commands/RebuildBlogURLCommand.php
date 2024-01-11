<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class RebuildBlogURLCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rebuild:url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild all the blog url';

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
            $item->update([
                'url' => 'https://'.$item->name.'.write.mv',
            ]);
        });

        $this->info('Done!');
    }
}
