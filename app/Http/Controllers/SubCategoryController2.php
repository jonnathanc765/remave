<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Category;

class SubCategoryController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('new_dashboard.admin.subcategories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('new_dashboard.admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {
        $subcategory = SubCategory::create($request->all());
        
        return redirect()->route('subcategories.edit', $subcategory)->withSucces('Categoria Creada Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($subCategoryId)
    {
        $subCategory = SubCategory::find($subCategoryId);
        $categories = Category::all();
        return view('new_dashboard.admin.subcategories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, $subCategoryId)
    {
        $subCategory = SubCategory::find($subCategoryId);
        $subCategory->update($request->all());
        return back()->withSuccess('Subcategoria actualizada exisotamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($subCategoryId)
    {
        SubCategory::destroy($subCategoryId);
        return redirect()->route('subcategories.index')->withSuccess('Subcategoria eliminada exisotamente');
    }
}
