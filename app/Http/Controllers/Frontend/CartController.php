<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Http\Controllers\Controller;
use App\Product;
use App\State;
use App\User;
use App\Zone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()

    {
        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the products in Cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //  dd($cartItems);
        $cartItems = Cart::instance('shopping')->content();

        $cartItems = $cartItems->values();
        $cartItems = $cartItems->map(function ($cartItem) {
            $array = Arr::add($cartItem->toArray(), 'image', $cartItem->model->images->first()->path);
            $array = Arr::add($array, 'code', $cartItem->model->code);

            return $array;
        });

        return view('frontend.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in instance cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productCode)
    {

        if ($request->quantity <= 0) {
            return back()->withError('Tienes que agregar por lo menos un producto');
        }



        $product     = Product::whereCode($productCode)->first();
        $itemsInCart = Cart::instance('shopping')->content();

        if ($product->owner->id == Auth::id()) {
            return back()->withError('No puede agregar productos de usted mismo');
        }

        foreach ($itemsInCart as $item) {
            if ($item->model->owner->id != $product->owner->id) {
                return back()->withError('Lo sentimos, no puede hacer compras de diferentes tiendas al mismo tiempo');
            }
        }

        $id                            = $product->id;
        $name                          = $product->name;
        $price                         = $product->price();
        $request->quantity ? $quantity = $request->quantity : $quantity = 1;

        if ($product->quantity < $quantity) {
            return back()->withError('No hay esta cantidad de productos en stock');
        }


        $cartItem = Cart::instance('shopping')->add($id, $name, $quantity, $price);


        Cart::instance('shopping')->associate($cartItem->rowId, $product);


        $cartItems = Cart::instance('shopping')->content();

       // $rowId    = $request->input('rowId_');
       // $quantity = $request->input('product_quantity_');


      //  $cartItem = Cart::instance('shopping')->get($rowId);


        if ($cartItem->model->quantity < $quantity) {
            return response('Este Producto se ha quedado sin stock', 400);
        }






         // Esto actualizara la cantidad de este producto
    //    Cart::instance('shopping')->update($rowId, $quantity);
        


        return redirect()->route('cart.index')->with(compact('cartItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $rowId    = $request->rowId;
        $quantity = $request->quantity;
        $row      = Cart::instance('shopping')->get($rowId);
        
        // Esto actualizara la cantidad de este producto
        if (Cart::instance('shopping')->update($rowId, $quantity)) {
            return response()->json([
                'message' => 'Success',
                'row'     => $row,
                'model'   => $row->model,
            ], 200);
        }

        //Error
        return response()->json([
            'message' => 'Success',
            'row'     => $row,
            'model'   => $row->model,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::instance('shopping')->destroy();
        return response()->json([
            'message' => 'Todos los productos fueron eliminados de su carrito'
        ]);
    }

    /**
     * Show the Product Checkout before buy
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
{



   // {
     // $cartItems = Cart::instance('shopping')->content();

      //foreach ($cartItems as $item) {
        //if ($item->qty > $item->model->quantity) {
           // return back()->withErrors('Usted esta intentando comprar mas productos del que hay disponible en stock, por favor verifique');

       // }
    //}

    $cartItems = Cart::instance('shopping')->content();
    $states    = State::all();
    $cities    = City::all();
    $zones     = Zone::all();
    $user      = User::with('userDetail.city', 'userDetail.state', 'userDetail.zone')
    ->find(Auth::id());

    return view('frontend.checkout', compact('cartItems', 'states', 'cities', 'zones', 'user'));
}
}
