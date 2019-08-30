<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('subCategories')->paginate(10);
        return view('new_dashboard.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_dashboard.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category;
        /**
         * Se comprueba que estado tiene el 
         * boton de publicado
         */
        if (empty($request->published)) {
            $category->published = false;
        }else {
            $category->published = true;
        }

        /**
         * Se comprueba de que la imagen se subio...
         * si es asi, se guarda en el storage 
         */
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('public/categories');
        }

        $category->name        = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.categories.edit', $category)->withSuccess('Categoria Creada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view('new_dashboard.admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId)
    {
        $category = Category::find($categoryId);
        return view('new_dashboard.admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $categoryId)
    {
        $category = Category::find($categoryId);
        /**
         * Se comprueba que estado tiene el 
         * boton de publicado
         */
        if (empty($request->published)) {
            $category->published = false;
        }else {
            $category->published = true;
        }

        /**
         * Se comprueba de que la imagen se subio...
         * si es asi, se guarda en el storage 
         * y se borra la imagen anterior
         */
        if ($request->hasFile('image')) {
            \Storage::delete($category->image);
            $category->image = $request->file('image')->store('public/categories');
        }

        $category->name        = $request->name;
        $category->description = $request->description;
        $category->save();
        
        return back()->withSuccess('Categoria Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {
        Category::destroy($categoryId);
        return redirect()->route('admin.categories.index')->withSuccess('Categoria Eliminada Exitosamente');
    }
}
