<?php

namespace App\Http\Controllers\Provider;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
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
        $banner = Banner::where('shop_id', Auth::user()->shop->id)->first();

        return view('new_dashboard.provider.banner', ['banner' => $banner]);
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
            'banner' => 'required|image',
            'name'   => 'required|string',
        ]);

        $banner = Banner::where('shop_id', Auth::user()->shop->id)->first();
        if (!empty($banner)) {

            Storage::delete($banner->path);

            $banner->delete();
        }

        $path = $request->file('banner')->store('public/banners');

        Banner::create([
            'shop_id' => Auth::user()->shop->id,
            'name'    => $request->name,
            'path'    => $path,
        ]);

        return redirect()->back()->withSuccess('Banner de su tienda subido exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->back()->withSuccess('Banner eliminado de su tienda exitosamente');
    }
}
