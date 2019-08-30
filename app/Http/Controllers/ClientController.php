<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
        $users = User::role('client')->get();

        return view('new_dashboard.admin.users.clients.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {

        $user = User::with('orders.orderDetails')->find($userId);

        $data = collect([]);
        // Numero total de ordenes
        $data->totalOrders = $user->orders->count();
        // Total dinero en ordenes Y total productos comprados
        $data->totalOrdersMoney = 0;

        $data->totalProductOrdered = 0;
        foreach($user->orders as $order) {
            $data->totalProductOrdered += $order->orderDetails->count();
            foreach ($order->orderDetails as $detail) {
                $data->totalOrdersMoney+= $detail->total;
            }
        }

        $data->orders = $user->orders;        

        $data->mostExpensiveOrder = $user->orders->pluck('total')->max();

        // dd($data->totalOrdersMoney);

        return view('new_dashboard.admin.users.clients.show', compact('user','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->withSuccess('Cliente Eliminado');
    }
}
 