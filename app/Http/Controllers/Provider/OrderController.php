<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereHas('orderDetails', function ($query) {
            $query->whereHas('product', function ($query) {
                $query->whereHas('post', function ($query) {
                    $query->whereHas('shop', function ($query) {
                        $query->whereHas('user', function ($query) {
                            $query->whereId(Auth::id());
                        });
                    });
                });
            });
        })->orderBy('id', 'DESC')->get();
        return view('new_dashboard.provider.orders.index', compact('orders'));
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
    public function show(Order $order)
    {
        if ($order->provider->id == Auth::id()) {
            return view('new_dashboard.provider.orders.show', compact('order'));
        }

        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function cancel(Order $order)
    {
        $order->status = 'failed';
        $order->save();
        return back()->withSuccess('Orden #' . strtoupper($order->code) . ' Cancelada');
    }

    public function shipped(Order $order)
    {
        if ($order->shipped) {
            return response()->json([
                'message' => 'ERROR, this order has already been marked as paid',
                'order'   => $order,
            ], 400);
        }

        $order->shipping();

        return response()->json([
            'message' => 'shipped',
            'order'   => $order,
        ], 200);
    }


//public function ProductStock($id){      
  //  $producto = Product::find( Cart::find($id)->product->id );

    //$car = Cart::find($id);
    //if ($producto->quantity < $car->quantity){
      //  return -1;
   // }
    //$producto->quantity = $producto->quantity - $car->quantity;

  //  $producto->update();
//
    //$car->delete();
//}


}
