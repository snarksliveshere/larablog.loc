<?php

namespace App\Listeners;

use App\Events\onBeforeIncartEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BeforeIncartListener
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
     * @param  onBeforeIncartEvent  $event
     * @return void
     */
    public function handle(onBeforeIncartEvent $event)
    {
        //
    }
}
