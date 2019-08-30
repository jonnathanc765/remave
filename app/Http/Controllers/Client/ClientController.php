<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:client');
    }
    /**
     * Display the dashboard of the specific resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Declaracion de coleccion para retornar todos los datos
        $data = collect([]);

        $orders = Order::whereUserId(Auth::id())->orderBy('updated_at', 'desc')->take(6)->get();

        // Numero total de productos adquiridos
        $acquiredProducts = 0;

        // Producto mas caro adquirido
        $mostExpensiveProduct = 0;

        // total gastado
        $totalSpent = 0;
        foreach ($orders as $order) {
            $totalSpent += $order->orderDetails->pluck('total')->sum();

            if ($order->status == 'successful') {
                $acquiredProducts += $order->orderDetails->pluck('quantity')->sum();
            }

            foreach ($order->orderDetails as $detail) {
                if (($detail->total / $detail->quantity) > $mostExpensiveProduct) {
                    $mostExpensiveProduct = $detail->total / $detail->quantity;
                }
            }
        }
        $data['totalSpent']           = $totalSpent;
        $data['acquiredProducts']     = $acquiredProducts;
        $data['mostExpensiveProduct'] = $mostExpensiveProduct;

        // Numero total de ordenes
        $totalOrders         = 0;
        $totalOrders         = $orders->count();
        $data['totalOrders'] = $totalOrders;

        return view('new_dashboard.client.index', compact('orders', 'data'));
    }

    /**
     * Display the info of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info(User $user)
    {
        if (Auth::user()->can('registrar tienda')) {
            return view('dashboard.clients.client.info');
        }
        return redirect()->route('dashboard.client');
    }

    public function orders()
    {
        $orders = Order::with('orderDetails.product.post.shop', 'user')->whereUserId(Auth::id())->orderBy('updated_at', 'desc')->get();

        return view('new_dashboard.admin.orders.index', compact('orders'));
    }
}
