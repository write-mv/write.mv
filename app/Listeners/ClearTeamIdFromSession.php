<?php

namespace App\Listeners;

class ClearTeamIdFromSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        session()->forget('team_id');
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
