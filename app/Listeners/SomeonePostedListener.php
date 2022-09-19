<?php

namespace App\Listeners;

use App\Events\SomeonePostedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SomeonePosted;

class SomeonePostedListener
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
     * @param  \App\Events\SomeonePostedEvent  $event
     * @return void
     */
    public function handle(SomeonePostedEvent $event)
    {
        $event->user->notify(new SomeonePosted(auth()->user()));
    }
}
