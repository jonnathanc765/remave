<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('new_dashboard.admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:200|min:3',
            'description' => 'required|string|min:20',
        ],
            [
                'name.required'        => 'El campo es requerido',
                'name.string'          => 'El campo debe ser de tipo texto',
                'name.max'             => 'El campo no debe ser mayor a 200 caracteres',
                'name.min'             => 'El campo debe tener minimo 20 caracteres',
                'description.required' => 'El campo es requerido',
                'description.string'   => 'El campo debe ser de tipo texto',
                'description.min'      => 'El campo debe tener minimo 100 caracteres',
            ]);
        Category::create($data);
        return redirect()->route('category.list');
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:200|min:3',
            'description' => 'required|string|min:20',
        ],
            [
                'name.required'        => 'El campo es requerido',
                'name.string'          => 'El campo debe ser de tipo texto',
                'name.max'             => 'El campo no debe ser mayor a 200 caracteres',
                'name.min'             => 'El campo debe tener minimo 20 caracteres',
                'description.required' => 'El campo es requerido',
                'description.string'   => 'El campo debe ser de tipo texto',
                'description.min'      => 'El campo debe tener minimo 100 caracteres',
            ]);

        $category->update($data);
        return redirect()->route('category.list');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->withSuccess('Categoria eliminada');
    }

    public function bannerIndex($position)
    {
        $banners = Category::where('published', 1)->get();
        return view('dashboard.Banners.Categories.index', compact('banners', 'position'));
    }

    public function createBanner()
    {
        $categories = Category::all();
        $banners    = Category::where('published', 0)->where('image', '!=', null)->get();
        return view('dashboard.Banners.Categories.createBannerCategory', compact('categories', 'banners'));
    }

    public function storeBanner(Request $request)
    {
        $data = $request->validate([
            'categoria' => 'required',
            'banner'    => 'required|image|max:5000',
        ]);

        $request->file('banner')->storeAs('public/BannerCategory', $request->file('banner')->getClientOriginalName());

        $id       = $request->input('categoria');
        $category = Category::where('id', $id);
        $banner   = [
            'image'     => $request->file('banner')->getClientOriginalName(),
            'published' => 1,
        ];
        $category->update($banner);
        $position = 7;
        return redirect()->route('banner.category', $position);
    }

    public function addBannerCategory(Request $request, $atras)
    {
        $data = $request->validate([
            'categoria' => 'required',
            'banner'    => 'required|image|max:5000',
        ]);

        $request->file('banner')->storeAs('public/BannerCategory', $request->file('banner')->getClientOriginalName());

        $id       = $request->input('categoria');
        $category = Category::where('id', $id);
        $banner   = [
            'image'     => $request->file('banner')->getClientOriginalName(),
            'published' => 0,
        ];
        $category->update($banner);
        $position = 7;
        return redirect()->route('banner.category.editBanner', $atras);
    }

    public function editBanner(Category $atras)
    {
        $categories = Category::all();
        $banners    = Category::where('published', '=!', 1)->where('image', '!=', null)->get();
        return view('dashboard.Banners.Categories.edit', compact('atras', 'banners', 'categories'));
    }

    public function updateBanner(Category $atras, Category $banner, $position)
    {
        $banner->published = 1;
        $banner->save();

        $atras->published = 0;
        $atras->save();

        return redirect()->route('banner.category', $position);
    }

    public function addBanner(Category $banner)
    {
        $banner->published = 1;
        $banner->save();
        return redirect()->route('banner.category', $position = 7);
    }

}
