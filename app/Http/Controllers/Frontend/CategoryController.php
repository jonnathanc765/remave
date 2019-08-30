<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query       = $request->s;
        $paginate    = $request->paginate ? $request->paginate : 12;
        $categories  = Category::search($query)->paginate($paginate);
        $bestSellers = $this->bestSellers();

        $categoriesSideBar = Category::with('products')->get();

        return view('frontend.categories.index', compact('categories', 'categoriesSideBar', 'query', 'paginate', 'bestSellers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Request $request)
    {
        $query = $request->s;

        $paginate = $request->paginate ? $request->paginate : 12;

        $categoriesSideBar = Category::with('products')->get();

        $subcategories = SubCategory::where('category_id', $category)->paginate($paginate);

        $category->load('products.images', 'products.subcategory');

        $bestSellers = $this->bestSellers();

        return view('frontend.categories.show', compact(
            'categoriesSideBar',
            'category',
            'subcategories',
            'bestSellers'
        ));
    }

    /**
     * Return a collection with best sellers products
     *
     * @return Collection
     */
    public function bestSellers()
    {
        $products = Product::withCount('orderDetails')
            ->with('images')
            ->orderBy('order_details_count', 'desc')
            ->take(12)
            ->get()
            ->chunk(3);

        return $products;
    }
}
