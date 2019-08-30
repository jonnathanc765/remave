<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SubCategory;
use App\Category;

class SubCategoryController extends Controller
{
   public function index(Category $category){
   		 $categorys = Category::all();
         return view('dashboard.category.subcategory.index', compact('categorys'));
   }
    public function create(Category $category){
   		 
       return view('dashboard.category.subcategory.create', compact('category'));
   }

     public function store(Request $request, Category $category)
    {
    	$data = $request->validate([
            'name'=> 'required|string|max:200|min:3',
            'description'=> 'required|string|min:3',
        ],
        [
            'name.required'=> 'El campo es requerido',
            'name.string'=> 'El campo debe ser de tipo texto',
            'name.max'=> 'El campo no debe ser mayor a 200 caracteres',
            'name.min'=> 'El campo debe tener minimo 20 caracteres',
            'description.required'=> 'El campo es requerido',
            'description.string'=> 'El campo debe ser de tipo texto',
            'description.min'=> 'El campo debe tener minimo 100 caracteres'
        ]);
        $data = array_merge($data, array('category_id' => $category->id));
         SubCategory::create($data);
         return redirect()->route('category.list');
    }
    public function edit(Category $category, SubCategory $subcategory)
    {
        return view('dashboard.category.subcategory.edit', compact('category','subcategory'));
    }

    public function update(Request $request,SubCategory $subcategory)
    {
        $data= $request->validate([
            'name'=> 'required|string|max:200|min:3',
            'description'=> 'required|string|min:20',
        ],
        [
            'name.required'=> 'El campo es requerido',
            'name.string'=> 'El campo debe ser de tipo texto',
            'name.max'=> 'El campo no debe ser mayor a 200 caracteres',
            'name.min'=> 'El campo debe tener minimo 20 caracteres',
            'description.required'=> 'El campo es requerido',
            'description.string'=> 'El campo debe ser de tipo texto',
            'description.min'=> 'El campo descripción debe tener minimo 20 caracteres'
        ]);
        $subcategory->update($data);
        return redirect()->route('category.list'); 
    }

   
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('category.list')->withSuccess('Subcategoria eliminada');
    }
}
