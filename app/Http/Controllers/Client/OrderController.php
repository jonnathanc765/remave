<?php

namespace App\Http\Controllers\Client;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderSuccess;
use App\Http\Controllers\Client\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders->load('orderDetails.product.post.shop');
        return view('new_dashboard.client.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $code)
    {
        $order = Order::whereCode($code)->first();
        if (Auth::id() == $order->user->id) {
            $order->load('orderDetails.product');
            return view('new_dashboard.client.orders.show', compact('order'));
        }
        return abort(403);
    }

    /**
     * Cancel the specified order
     * 
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancel(Order $order)
    {
        if ($order->user_id == Auth::user()->id && $order->status == 'pending') {
            Cart::instance('shopping')->destroy();
            $order->load('orderDetails.product');
            foreach ($order->orderDetails as $orderDetail) {
                $product  = $orderDetail->product;
                $id       = $product->id;
                $name     = $product->name;
                $price    = $product->price();
                $quantity = $orderDetail->quantity;
                $cartItem = Cart::instance('shopping')->add($id, $name, $quantity, $price);
                Cart::instance('shopping')->associate($cartItem->rowId, $product);
            }
            $order->forceDelete();
            return redirect()->route('cart.index')->withSuccess('La orden se a cargado en un nuevo carrito de compras');
        } else {
            return redirect()->back()->withError('No puede cancelar esta orden');
        }
    }

    public function orderReceived(Order $order)
    {
        if (Auth::user()->id == $order->user->id) {
            if ($order->shipped) {
                if ($order->givePoints()) {

                    $order->markAsSuccess();

                    event(new OrderSuccess($order));

                    return response()->json([
                        'message' => 'Marcada como recibida',
                        'order' => $order,
                    ]);
                }
            }
            
        }

        return abort(403);
    }
}

     // reducir stock inicio
               // $getProductStock = Products::where('sku',$this->generateOrderCode())->first(),
              //  echo "Original Stock".$getProductStock->stock,
                //echo "stock reduce".$item->qty,
               // $newStock= $getProductStock->stock - $item->qty,
                //roductsAttribute::where('sku',$this->generateOrderCode())->update(['stock'=>$newStock]),
                //fin