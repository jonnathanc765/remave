<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Configuration;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index($position = 1)
    {
        $limit            = $this->limit($position);
        $bannersPublished = Banner::where('position', $position)->with('shop')->get();
        $allBanners       = Banner::where('position', '0')->get();
        return view('new_dashboard.admin.banners.index', compact('bannersPublished', 'allBanners', 'position', 'limit'));
    }

    public function edit(Banner $atras, $position)
    {
        $banners = Banner::where('position', '!=', $position)->get();
        return view('dashboard.Banners.edit', compact('banners', 'position', 'atras'));
    }

    public function update(Banner $atras, Banner $banner, $position)
    {
        $data = [
            'position' => $position,
        ];
        $banner->update($data);
        $data2 = [
            'position' => 0,
        ];
        $atras->update($data2);
        return redirect()->route('banner', $position);
    }

    public function select($position)
    {
        $banners = Banner::where('position', 0)->get();
        return view('new_dashboard.admin.banners.index', compact('position', 'banners'));
    }

    public function published(Banner $banner, $position)
    {

        $limit   = $this->limit($position);
        $banners = Banner::where('position', $position)->get();
        if ($banners->count() >= $limit) {
            return back()->withError('Ha superado el limite de banners para esta posición');
        }
        $banner->update(['position' => $position]);
        return redirect()->route('banner', $position)->withSuccess('Banner Publicado Exitosamente');
    }

    public function indexProvider()
    {
        $shopId  = Shop::where('user_id', Auth::id())->first();
        $banners = Banner::where('shop_id', $shopId->id)->get();
        return view('dashboard.provider.banner.list', compact('banners'));
    }
    public function addProvider()
    {
        return view('dashboard.provider.banner.add');
    }

    public function store(Request $request)
    {
        $files = $request->file('ID_1_banner');
        $id    = Shop::where('user_id', Auth::id())->first();
        foreach ($files as $file) {
            $banners          = new Banner;
            $path             = $file->store('public/banners');
            $banners->shop_id = $id->id;
            $banners->path    = $path;
            $banners->save();
        }
        return back()->withSuccess('Banners subido exitosamente!');
    }

    function unset(Banner $banner) {
        $banner->position = 0;
        $banner->save();
        return back()->withSuccess('El banner seleccionado ya no se encuentra publicado');
    }
    public function destroy($id)
    {
        $name = Banner::where('id', $id)->first();
        $file = $name->name;
        Storage::delete($file);
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->route('listBanner')->withSuccess('Banner eliminado de forma exitosa');
    }
    public function limit($position)
    {
        // Traer el limite de banners por posición
        // dd($position);
        switch ($position) {
            case 1:
                $limit = Configuration::where('name', 'LIKE', "%principalBannerLimit%")->first();
                break;
            case 2:
                $limit = Configuration::where('name', 'LIKE', "%categoryBannerLimit%")->first();
                break;
            case 3:
                $limit = Configuration::where('name', 'LIKE', "%centralHighBannerHigh%")->first();
                break;
            case 4:
                $limit = Configuration::where('name', 'LIKE', "%centralLowBannerLimit%")->first();
                break;
            case 5:
                $limit = Configuration::where('name', 'LIKE', "%featuredStores%")->first();
                break;
            default:
                $limit        = collect([]);
                $limit->value = 0;
        }

       // return $limit->value;
    }

    public function shop()
    {
        $shops = Shop::all();
        return view('new_dashboard.admin.banners.shop', compact('shops'));
    }

    public function shopStore(Request $request)
    {
        $data = $request->validate([
            'banner' => 'required|image',
            'name' => 'required'
        ],[
            'banner.required' => 'Debe cargar una imagen',
            'name.required' => 'El nombre del banner es requerido, de esta forma se mejora el SEO de la página'
        ]);
        $shop   = Shop::find($request->shop);
        // dd($shop->banner);
        if ($shop->banner()->exists()) {
            $shop->banner->delete();
        }
        $banner = $request->file('banner')->store('public/banners');

        Banner::create([
            'shop_id' => $shop->id,
            'name'    => $request->name,
            'path'    => $banner,
        ]);

        return redirect()->route('shop.show', $shop)->withSuccess('Banner guardado exitosamente');
    }
}
