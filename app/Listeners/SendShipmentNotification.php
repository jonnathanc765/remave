<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use App\Notifications\OrderShippedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipmentNotification
{
    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        $event->order->user->notify(new OrderShippedNotification($event->order));
    }
}
