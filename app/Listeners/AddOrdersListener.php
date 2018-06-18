<?php

namespace App\Listeners;

use App\Events\onAddOrders;
use App\Events\onAddOrdersEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class AddOrdersListener
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
     * @param  onAddOrders  $event
     * @return void
     */
    public function handle(onAddOrdersEvent $event)
    {
//        dd($event->order_email);
        Log::info('Order email', ['add_order_email' => $event->order_email]);

    }
}
