<?php

namespace App\Listeners\User;

use Log;
use Mail;
use App\Mail\Welcome;
use App\Events\User\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Log::info($event->getUser());
        Mail::to($event->getUser()->email)->send(new Welcome());
    }
}
