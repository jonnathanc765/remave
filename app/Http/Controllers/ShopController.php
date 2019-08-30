<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Banner;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('provider')) {
            return back()->withError('No puede registrar mas de una tienda');
        }
        $zones = Zone::all();
        return view('new_dashboard.client.register-shop', ['zones' => $zones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string',
            'description'     => 'required|string',
            'minimum_ammount' => 'integer',
            'address'         => 'required|string',
            'zone_id'         => 'required|string',
            'phone'           => 'required|string',
            'logo'            => 'required|image|file|mimes:jpg,jpeg,bmp,png',
        ]);

        $path                  = $request->file('logo')->store('public/logos');
        $shop                  = new Shop;
        $shop->user_id         = Auth::user()->id;
        $shop->name            = $request->name;
        $shop->description     = $request->description;
        $shop->logo            = $path;
        $shop->minimum_ammount = $request->minimum_ammount;
        $shop->zone_id         = $request->zone_id;
        $shop->address         = $request->address;
        $shop->phone           = $request->phone;

        if ($shop->save()) {
            Auth::user()->assignRole('provider');
            Auth::user()->revokePermissionTo('registrar tienda');

            return redirect()->route('shop.after', $shop)->withSuccess('Tienda registrada Exitosamente');
        }

        return redirect()->back()->withErrors('Tenemos un problema, la tienda no se pudo registrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function after(Shop $shop)
    {
        return view('new_dashboard.client.after-shop', compact('shop'));
    }
}
