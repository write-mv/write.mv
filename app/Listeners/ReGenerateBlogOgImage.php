<?php

namespace App\Listeners;

use App\Events\BlogNameUpdated;
use App\Jobs\GenerateBlogOgImage;

class ReGenerateBlogOgImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(BlogNameUpdated $event)
    {
        GenerateBlogOgImage::dispatch($event->blog);
    }
}
