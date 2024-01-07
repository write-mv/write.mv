<?php

namespace App\Events;

use App\Models\Blog;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlogNameUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
}
