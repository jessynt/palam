<?php

namespace App\Listeners\User;

use App\Events\User\UserLoggedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoggedListener
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedEvent  $event
     * @return void
     */
    public function handle(UserLoggedEvent $event)
    {
        \Log::info($event->getUser());
    }
}
