<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class ProviderNewGeneratedOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var User
     */
    public $order;

    /**
     * The collection of Products.
     *
     * @var Product
     */
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $products)
    {
        $this->order     = $order;
        $this->products = $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Alguien ha comprado en su tienda')
                    ->view('emails.provider-order-email');
    }
}
