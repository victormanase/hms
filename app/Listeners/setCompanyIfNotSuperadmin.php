<?php

namespace App\Listeners;

use App\Events\LoggedInUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class setCompanyIfNotSuperadmin
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
     * @param  LoggedInUser  $event
     * @return void
     */
    public function handle(LoggedInUser $event)
    {
        //
    }
}
