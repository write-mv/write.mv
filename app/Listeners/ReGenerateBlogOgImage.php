<?php

namespace App\Listeners;

use App\Events\BlogNameUpdated;
use App\Jobs\GenerateBlogOgImage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  BlogNameUpdated  $event
     * @return void
     */
    public function handle(BlogNameUpdated $event)
    {
        GenerateBlogOgImage::dispatch($event->blog);
    }
}
