<?php

namespace App\Events;

use App\Cart;
use App\Order;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class onAddOrdersEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_name;
    public $order_email = [];


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, Cart $cart)
    {
//        $this->user_name = $user->name;
        $this->order_email = $request->input('email');

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
