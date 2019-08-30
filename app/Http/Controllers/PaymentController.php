<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;
use MercadoPago;

class PaymentController extends Controller
{
    public function confirmation($orderCode)
    {
        $order = Order::whereCode($orderCode)->firstOrFail();
        if ($order->user_id == Auth::user()->id) {

            $thread = $this->thread($order);

            return view('frontend.payment_confirmation', ['order' => $order, 'thread' => $thread]);
        } else {

            return redirect()->route('home')->withError('No tiene permisos para ver esta orden');

        }
    }

    public function successful($orderCode, Request $request)
    {
        $order           = Order::wherecode($orderCode)->first();
        $access_token_id = $order->orderDetails->first()->product->post->shop->access_token;
        $url             = "https://api.mercadopago.com/v1/payments/" . $request->collection_id . "";

        $response = Curl::to($url)->withData(array('access_token' => $access_token_id))->get();
        $response = json_decode($response);
        $user = Auth::user();
        if ($response && $order->user_id == $user->id) {
            if ($response->status == 'approved') {
                return redirect()->route('home')->withSuccess('Pago realizado exitosamente');
            }
        }

        return redirect()->route('payment.confirmation', $orderCode)->withError('Pago Fallido intente de nuevo');
    }

    public function proceed($orderCode)
    {
        $order = Order::whereCode($orderCode)->first();
        if ($order->provider->shop->access_token == null) {
            return back()->withErrors('Este vendedor no se encuentra asociado a ninguna cuenta de mercado pago. Por favor informe al adminitrador de este problema.');
        }
        $access_token_id = $order->orderDetails->first()->product->post->shop->access_token;
        $user            = Auth::user();
        $title           = $order->orderDetails->first()->product->post->shop->name;
        $comision        = Configuration::where('name', 'comision')->first()->value;

        MercadoPago\SDK::setAccessToken($access_token_id);

        $preference        = new MercadoPago\Preference();
        $item              = new MercadoPago\Item();
        $item->id          = $order->code;
        $item->title       = $title;
        $item->quantity    = 1;
        $item->currency_id = "$";
        $item->unit_price  = $order->total;

        $payer                       = new MercadoPago\Payer();
        $payer->email                = $user->email;
        $preference->items           = array($item);
        $preference->payer           = $payer;
        $preference->marketplace_fee = $comision;
        $preference->back_urls       = array(
            "success" => route('payment.successful', $order->code),
            "failure" => route('payment.failure', $order->code),
            "pending" => route('payment.pending', $order->code),
        );
        $preference->auto_return      = "approved";
        $preference->notification_url = route('ipnNotification', $order->code);

        $preference->external_reference = $orderCode;
        $preference->save();
        $link = $preference->init_point;

        return redirect()->to($link);
    }

    /**
     * Crea un hilo entre el proveedor
     * y el cliente.
     */
    public function thread($order)
    {
        $subject  = $order->orderDetails->first()->product->name;
        $provider = $order->orderDetails->first()->product->post->shop->user->id;

        $thread = Thread::create([
            'subject' => $subject,
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id'   => Auth::id(),
            'body'      => 'Hola, he generado una orden para comprar tu articulo ' . $subject,
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id'   => Auth::id(),
            'last_read' => new Carbon,
        ]);

        $thread->addParticipant($provider);

        return $thread;
    }
}
