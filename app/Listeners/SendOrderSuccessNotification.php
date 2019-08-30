<?php

namespace App\Listeners;

use App\Events\OrderSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderSuccessNotification
{
    /**
     * Handle the event.
     *
     * @param  OrderSuccess  $event
     * @return void
     */
    public function handle(OrderSuccess $event)
    {
        
    }
}
