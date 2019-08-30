<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\OrderStoreRequest;
use App\Mail\ClientNewGeneratedOrder;
use App\Mail\ProviderNewGeneratedOrder;
use App\Order;
use App\OrderDetail;
use Barryvdh\DomPDF\Facade as PDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $orders = Order::with('user', 'orderDetails.product.post.shop.user')->get();
            return view('new_dashboard.admin.orders.index', compact('orders'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function pdfOrden($order_id,Request $request)
    {
        
        $order=Order::where('id',$order_id)->first();
        $pdf = PDF::loadView('pdf.payment_confirmation', compact('order'));
       // \History::addToLog('Ordenes (Cliente)','Ha generado una lista de ordenes', $request);
        return $pdf->download('orden.pdf');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $items = Cart::instance('shopping')->content();
        Cart::instance('shopping')->destroy();

        if ($items->count() == 0) {
            return back()->withError('No tiene productos que comprar');
        }

        $order = Order::create([
            'user_id'      => Auth::user()->id,
            'code'         => $this->generateOrderCode(),
            //'payment_type' => $request->payment_type,
            'state_id'     => $request->state_id,
            'city_id'      => $request->city_id,
            'zone_id'      => $request->zone_id,
            'zip_code'     => $request->zip_code,
            'street'       => $request->street,
            'address'      => $request->address,
            'bank_reference'=> $request->bank_reference,
            'name_bank'    =>  $request->name_bank,  
            'status'       => 'pending',
        ]);

        $products = collect([]);
        foreach ($items as $item) {
            OrderDetail::create([
                'order_id'   => $order->id,
                'product_id' => $item->model->id,
                'quantity'   => $item->qty,
                'taxe'       => $item->taxRate,
                'total'      => $item->qty * $item->model->price(),
            ]);
             /**
             * Se decrementa la cantidad del producto comprado
             */

            $product = $item->model;
            $product->decrement('quantity', $item->qty);
            if ($product->quantity == 0) {
                // dd($product);
                $product->delete();
            }
           // $products->push($product);

             

            $products->push($item->model);
        }

        Mail::to($order->user)->send(new ClientNewGeneratedOrder($order, $products));
        Mail::to($order->provider)->send(new ProviderNewGeneratedOrder($order, $products));

        return redirect()->route('payment.confirmation', $order->code)->withSuccess('Gracias. Tu orden ha sido recibida.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (Auth::user()->can('view', $order)) {
            $order->load('user.userDetail', 'orderDetails.product.post.shop.user');
            return view('new_dashboard.admin.orders.show', compact('order'));
        } else {
            return abort(403);
        }
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

    public function generateOrderCode()
    {
        $code = ucwords(str_random(12));

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($code)) {
            return generateOrderCode();
        }

        // otherwise, it's valid and can be used
        return $code;
    }

    public function barcodeNumberExists($code)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Order::whereCode($code)->exists();
    }

   
}
